@extends('emails.template')

@section('content')
@php
	$settings = \App\Models\Setting::where('active', 1)->first();
@endphp
	<div class="mb-5">
		<h2 class="fs-2 text-red-primary mb-4">Responding to Your Inquiry</h2>
		<p class="mb-3">Dear <strong>{{ $data->tpl_data->contact->name }},</strong>,</p>
		<p class="mb-4">Thank you for reaching out to us and sharing your concerns regarding our service. We appreciate your interest and want to ensure that any issues you have are addressed promptly and effectively.</p>
		<p class="mb-3">Below are the answers to the questions you raised:</p>
		<p class="mb-3">Your inquiry: {{ $data->tpl_data->contact->message }}</p>
		<p class="mb-4">Our solution: {{ $data->tpl_data->reply->message }}</p>
		<p class="mb-3">
			We understand the importance of your 
			queries and want to ensure your complete satisfaction. 
			If you have any further questions or require additional clarification, 
			please don't hesitate to contact us directly at this email address <strong>{{ $settings->company_email }}</strong> or by phone at <strong>{{ $settings->company_phone }}</strong> 
		</p>
		<p class="mb-3">
			We sincerely appreciate your interest, and we look forward to serving you to the best of our abilities.
		</p>
	</div>
@endsection