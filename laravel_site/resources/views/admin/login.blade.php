<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="robots" content="index,follow"/>
	<meta name="author" content="{{ env('APP_NAME') }}">
	<title>The One Digi</title>
	@include('layouts/sections/styles')
</head>
<body class="bg-white">
	<section>
		@php
			$settings = \App\Models\Setting::first();
		@endphp
		<div class="container bg-white w-100">
			<form action="{{ route('syslog.login') }}" method="POST">
				@csrf
				<div class="d-flex justify-content-center align-items-center"  style="height: 100vh;">
					<div class="">
						<div class="h-100 pt-md-0 d-flex justify-content-center align-items-center">
							<div>
								<div class="d-flex mb-4 justify-content-center align-items-center">
									<div class="ratio ratio-1x1" style="width: 100px; height: 100px">
										<img src="{{ asset('storage/'.$settings->logo) }}" alt="logo">
									</div>
									<h2 class="fw-bold text-danger fs-1 ms-5 mb-0">Vietnam <br> Immi.org</h2>
								</div>
								<div class="mb-4 text-center">
									<strong class="my-3 fs-2 fw-semibold">Login</strong>
								</div>
								<div class="form-login">
									<div class="apply-input-group mb-4">
										<label class="mb-2" for="email">
											<strong class="fw-semibold">Email <span class="text-danger">*</span></strong>
										</label>
										<input type="text" id="email" name="email" class="form-control rounded-3 custom-input" placeholder="enter your mail" autocomplete="off" required>
									</div>
									<div class="apply-input-group mb-4">
										<label class="mb-2" for="password">
											<strong class="fw-semibold">Password <span class="text-danger">*</span></strong>
										</label>
										<input type="password" id="password" name="password" class="form-control rounded-3 custom-input" autocomplete="off" placeholder="*******" required>
									</div>
									<div class="d-flex justify-content-center mb-4">
										<span class="text-decoration-underline text-center">Forgot your password ?</span>
									</div>
									<div>
										<button class="btn btn-red-400 w-100" type="submit" style="height: 50px">
											Log in
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</section>
	@include('layouts/sections/scripts')
</body>
</html>