@extends('emails.template')

@section('content')
@php
	$settings = \App\Models\Setting::where('active', 1)->first();
@endphp
	<div class="mb-5">
		<h2 class="fs-2 text-red-primary mb-4">Thank You for Your Inquiry</h2>
		<p class="mb-3">Dear <strong>{{ $data->tpl_data->name }}</strong>,</p>
		<p class="mb-4">Thank you for reaching out to us and providing the requested information. We have received your inquiry and are currently reviewing the details.</p>
		<p class="mb-3"><strong>Your inquiry:</strong></p>
		<p class="mb-4">{{ $data->tpl_data->message }}</p>
		<p class="mb-3">
			We assure you that we will provide feedback or address 
			your request at the earliest opportunity. In the meantime, if you 
			have any additional questions or require further information, please feel
			free to contact us directly at this email address <strong>{{ $settings->company_email }}</strong> or by
			phone at <strong>{{ $settings->company_phone }}</strong> 
		</p>
	</div>
@endsection