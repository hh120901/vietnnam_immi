<?php

namespace App\Http\Controllers;

use App\Models\MailDB;
use App\Models\Setting;
use App\Mail\ContactMail;
use App\Mail\ConfirmContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class Contact extends Controller
{
    //
    public function index(Request $request) {
		$settings = Setting::first();
		if ($request->isMethod('post')) {
			$request->validate(array(
				'contact_name' => 'required|string|max:255',
				'contact_email' => 'required|string|email|max:255',
				'contact_phone' => 'required|string|max:20',
				'contact_subject' => 'required|string',
				'contact_message' => 'required|string',
				'input_file' => 'file|mimes:pdf,jpg,png,doc|max:2048'
			));
            
            if ($request->hasFile('input_file')) {
                if ($request->file('input_file')->isValid()) {
                    $directory = 'career/'.$request->input('job_id');
                    $filename = time();
                    $filename .= $request->file('input_file')->getClientOriginalName();
                    $path = $request->file('input_file')->storeAs($directory, $filename, 'public');
                }
            }

            $input_phone = preg_replace('/^0+/', '', $request->input('contact_phone'));
            $contact_phone = '+'.$request->input('dialcode').$input_phone;

			$mail = new \stdClass();
			$mail->sender = $request->input('contact_email');
			$mail->receiver = $settings->company_email;
			$mail->name = $request->input('contact_name');
			$mail->phone = $contact_phone;
			$mail->subject = $request->input('contact_subject');
			$mail->attachment = $path ?? null;
			$mail->type = 'contact';
			$mail->message = $request->input('contact_message');
			$mail = MailDB::create((array)$mail);

			$data = array(
				'sender' => $request->input('contact_email'),
				'receivers' => $settings->company_email,
				'bcc'=> [$settings->cs_email],
				'subject' => '[VNIM Contact] - '.$request->input('contact_subject'),
              
				'tpl_data'	=> $mail,
			);
            if (!empty($path)) {
                $data['attachmentPath'] = $path;
            }

			Mail::send(new ContactMail((object) $data));

			$data['sender'] = $settings->cs_email;
			$data['receivers'] = $request->input('contact_email');

			Mail::send(new ConfirmContact((object) $data));

			return redirect()->back()->with(['success' => 'Sent Email Successfully!']);
		}
        
        return view('contact')->with('settings', $settings);
	}
}
