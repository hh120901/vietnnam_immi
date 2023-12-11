<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
	<style>
		* {
			font-family: 'Montserrat', sans-serif;
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}
		p {
			font-weight: 400;
		}
		.d-flex {
			display: flex;
		}
		.align-items-center {
			align-items: center;
		}
		.fw-semibold {
			font-weight: 600;
		}
		.fs-6 {
			font-size: 1rem;
		}
		.text-red-primary {
			color: #9C0B0B;
		}
		.fw-bold {
			font-weight: 700;
		}
		.fs-4 {
			font-size: 24px;
		}
		.fs-2 {
			font-size: 32px;
		}
		.fs-1 {
			font-size: 36px;
		}
		.mt-3 {
			margin-top: 1rem;
		}
		.mb-3 {
			margin-bottom: 1rem;
		}
		.mb-4 {
			margin-bottom: 1.5rem;
		}
		.mb-5 {
			margin-bottom: 3rem;
		}
		.mt-5 {
			margin-top: 3rem;
		}
		.social-icon {
			width: 2rem;
		}
	</style>
</head>
<body>
	@php
		$settings = \App\Models\Setting::where('active', 1)->first();
	@endphp
	<div class="container">
		<div class="d-flex mb-5" style="gap: 20px; align-items: center;">
			<a href="{{ url('/') }}"><img src="{{ asset('assets/images/logo_site.png') }}" width="64" alt="logo img"></a>
			<a href="{{ url('/') }}"><h4 class="fw-semibold" style="padding-bottom: 0.5rem">THE ONE <br> DIGI CORP</h4></a>
		</div>
		@yield('content')
		<div>
			<h4 class="fw-bold fs-4">Best Regards,</h4>
			<div class="d-flex" style="gap: 20px; align-items: center;">
				<a href="{{ url('/') }}" style="margin-right: 1rem"><img src="{{ asset('assets/images/logo_site.png') }}" width="64" alt="logo img"></a>
				<a href="{{ url('/') }}"><h4 class="fw-semibold" style="padding-bottom: 0.5rem">THE ONE <br> DIGI CORP</h4></a>
			</div>
			<p class="mb-3"><strong>Address: </strong>{{ $settings->company_address }}</p>
			<p class="mb-3"><strong>Hotline: </strong>{{ $settings->company_phone }}</p>
			<p class="mb-3"><strong>Email: </strong>{{ $settings->hr_email }}</p>
		</div>
		<div class="social-icon d-flex" style="gap: 1rem">
			<a href="#" style="margin-right: 1rem"><img class="social-icon" src="{{ asset('assets/images/icon-social/fb.png') }}" alt="FB"></a>
			<a href="#" style="margin-right: 1rem"><img class="social-icon" src="{{ asset('assets/images/icon-social/x.png') }}" alt="X"></a>
			<a href="#" style="margin-right: 1rem"><img class="social-icon" src="{{ asset('assets/images/icon-social/linkind.png') }}" alt="IN"></a>
		</div>	
	</div>
</body>
</html>