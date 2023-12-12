@extends('emails.template')

@section('content')
	<div class="mb-5">
		<h2 class="fs-2 text-red-primary mb-4">Notification - New Customer Inquiry Received</h2>
		<p class="mb-3">Dear <strong>Vietnam-Immi.org.vn</strong>,</p>
		<p class="mb-3">
			I hope you're having a great day. I'd like to inform you that we have just received a new request from a customer. Here are the details of the request:
		</p>
		<ul style="margin-left: 3rem;">
			<li class="mb-3">Name: {{ $data->tpl_data->name }}</li>
			<li class="mb-3">Email: {{ $data->tpl_data->sender }}</li>
			<li class="mb-3">Phone: {{ $data->tpl_data->phone }}</li>
			<li class="mb-3">Application Date: {{ $data->tpl_data->created_at->format('d-m-Y H:i') }}</li>
			<li class="mb-3">Message: {{ $data->tpl_data->message }}</li>
		</ul>
		<p class="mb-4">
			The customer has outlined their request as follows. They are expecting assistance from us and have suggested that a staff member will provide feedback.
		</p>
		<p style="padding-bottom: 1.5rem;">
			All the relevant information has been forwarded to you so that you can provide professional support and positive feedback to our customer. Please review the request and take the necessary actions as soon as possible.
		</p>
	</div>
@endsection