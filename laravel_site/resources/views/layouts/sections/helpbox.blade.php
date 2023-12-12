@php
	$settings = \App\Models\Setting::first();
@endphp
<div class="d-flex justify-content-center justify-content-lg-end">
	<div class="help-box">
		<div class="bg-dark mx-4">
			<h2 class="text-white py-2 text-center fw-semibold text-uppercase mt-3">
				need help 24/7
			</h2>	
		</div>
		<div class="mx-4">
			<p class="fw-medium">Phone: {{ $settings->company_phone }}</p>
			<div class="d-flex">
				<span class="fw-medium">Hotline: </span>
				<ul class="mb-3 px-2" style="list-style-type: none;">
					<li class="mb-2"><img src="{{ asset('assets/images/icons/vn.jpg') }}" alt=""> {{ $settings->hotline_vn }}</</li>
					<li class="mb-2"><img src="{{ asset('assets/images/icons/en.jpg') }}" alt=""> {{ $settings->hotline_en }}</li>
					<li class="mb-2"><img src="{{ asset('assets/images/icons/us.png') }}" alt=""> {{ $settings->hotline_usa }}</li>
				</ul>
			</div>
			
			<p class="fw-medium">Email: {{ $settings->company_email ?? '' }}</</p>
			<p class="fw-medium">Whats app: {{ $settings->whatsapp ?? '' }}</</p>
			<p class="fw-medium">Viber: {{ $settings->viber ?? '' }}</</p>
			<p class="fw-medium">Skype: {{ $settings->skype ?? '' }}</</p>
			<p class="fw-medium">Telegram: {{ $settings->telegram ?? ''}}</</p>
		</div>
	</div>
</div>