<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="robots" content="index,follow"/>
	<meta name="author" content="{{ env('APP_NAME') }}">
	<title>Vietnam-immi.org.vn</title>
	@include('layouts/sections/styles')
</head>
<body>
	@include('layouts/sections/header')
	<section>
		<div class="container">
			<div class="row px-0 mb-5 mx-sm-3">
				<div class="col-lg-8 px-sm-0">
					<div class="w-100 bg-red-primary h-100">
						{{-- Swiper --}}
						<div class="h-100">
							<div class="swiper mySwiper bg-light">
								<div class="swiper-wrapper">
									<div class="swiper-slide ratio ratio-1x1 sl2">
										<a href="#">
											<img class="brightness" src="{{ asset('assets/images/banners/slide-banner1.jpg') }}" alt="banner-image">
										</a>
									</div>
									<div class="swiper-slide ratio ratio-1x1 sl2">
										<a href="#">
											<img class="brightness" src="{{ asset('assets/images/banners/slide-banner2.jpg') }}" alt="banner-image">
										</a>
									</div>
									<div class="swiper-slide ratio ratio-1x1 sl2">
										<a href="#">
											<img class="brightness" src="{{ asset('assets/images/banners/slide-banner3.jpg') }}" alt="banner-image">
										</a>
									</div>
									<div class="swiper-slide ratio ratio-1x1 sl2">
										<a href="#">
											<img class="brightness" src="{{ asset('assets/images/banners/slide-banner4.jpg') }}" alt="banner-image">
										</a>
									</div>
									<div class="swiper-slide ratio ratio-1x1 sl2">
										<a href="#">
											<img class="brightness" src="{{ asset('assets/images/banners/slide-banner5.jpg') }}" alt="banner-image">
										</a>
									</div>
								</div>
								<div class="swiper-pagination"></div>
								{{-- custom navigation --}}
								<div class="d-flex justify-content-between">
									<div class="custom-prev-btn">
										<i class="fal fa-chevron-left fs-4"></i>
									</div>
									<div class="custom-next-btn">
										<i class="fal fa-chevron-right fs-4"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				{{-- Help box --}}
				<div class="col-lg-4 px-sm-0">
					<div class="d-flex justify-content-end">
						<div class="help-box">
							<div class="bg-dark mx-4">
								<h2 class="text-white py-2 text-center fw-semibold text-uppercase mt-3">
									need help 24/7
								</h2>	
							</div>
							<div class="mx-4">
								<p class="fw-medium">Phone:</p>
								<div class="d-flex">
									<span class="fw-medium">Hotline: </span>
									<ul class="mb-3 px-2" style="list-style-type: none;">
											<li class="mb-2"><img src="{{ asset('assets/images/icons/vn.jpg') }}" alt=""> +84</li>
											<li class="mb-2"><img src="{{ asset('assets/images/icons/en.jpg') }}" alt=""> +1</li>
											<li class="mb-2"><img src="{{ asset('assets/images/icons/us.png') }}" alt=""> +61</li>
									</ul>
								</div>
								
								<p class="fw-medium">Email:</p>
								<p class="fw-medium">Whats app:</p>
								<p class="fw-medium">Viber:</p>
								<p class="fw-medium">Skype:</p>
								<p class="fw-medium">Telegram:</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="box-information mx-sm-3 border border-secondary py-4 px-5">
				<p>
					Disclaimer: “vietnam-immi.org” is a private company specializing in Vietnamese tourism services (International Travel License No.: 79-1770/2023 CDLQGVN-GPLHQT). We operate on an Internet platform - online providing services in the field of tourism, consulting on immigration services, and supporting fast track service at international airports.
					<br>
					We are non-affiliated with the Vietnamese Government or the Immigration Department, therefore we charge consulting and supporting fees exclusive of regulated government fees. If you do not want to pay for consulting and support services, you can directly contact the Immigration Department or Consulate of Vietnam.

				</p>
				<p>
					Khuyến cáo: “vietnam-immi.org” là công ty tư nhân chuyên về dịch vụ du lịch của Việt Nam (Giấy phép lữ hành quốc tế số : 79-1770/2023 CDLQGVN-GPLHQT). Chúng tôi hoạt động trên nền tảng Internet - online (trực tuyến) cung cấp dịch vụ về lĩnh vực du lịch, tư vấn về dịch vụ xuất nhập cảnh và hỗ trợ dịch vụ đón tiễn ở sân bay quốc tế. 
					<br>
					Chúng tôi không phải là website của Chính phủ Việt Nam hay của Cục quản lý xuất nhập cảnh. Do vậy, chúng tôi có thu phí tư vấn và hỗ trợ dịch vụ chưa bao gồm phí chính phủ được quy định. Nếu quý khách không muốn tốn phí dịch vụ tư vấn và hỗ trợ, quý khách có thể liên hệ trực tiếp Cục xuất nhập cảnh hoặc Lãnh sự quán của Việt Nam.
				</p>
			</div>
			<div class="mx-sm-3 mt-5 pt-3">
				<h2 class="fw-bold mb-4">News of Vietnam Travel</h2>
				<ol>
					<li class="mb-3"><a class="text-second fw-medium" href="#">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</a></li>
					<li class="mb-3"><a class="text-second fw-medium" href="#">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</a></li>
					<li class="mb-3"><a class="text-second fw-medium" href="#">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</a></li>
					<li class="mb-3"><a class="text-second fw-medium" href="#">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</a></li>
					<li class="mb-3"><a class="text-second fw-medium" href="#">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</a></li>
				</ol>
			</div>

			<div class="mx-sm-3 mt-5 pt-3">
				<h2 class="fw-bold mb-4">News of Vietnam Visa and Airport Services </h2>
				<ol>
					<li class="mb-3"><a class="text-second fw-medium" href="#">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</a></li>
					<li class="mb-3"><a class="text-second fw-medium" href="#">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</a></li>
					<li class="mb-3"><a class="text-second fw-medium" href="#">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</a></li>
					<li class="mb-3"><a class="text-second fw-medium" href="#">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</a></li>
					<li class="mb-3"><a class="text-second fw-medium" href="#">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</a></li>
				</ol>
			</div>
		</div>
	</section>
	@include('layouts/sections/footer')
	@include('layouts/sections/scripts')
	<script>
		var homeSwiper = new Swiper(".mySwiper", {
				slidesPerView: 1,
				loop: true,
				navigation: {
					nextEl: ".custom-next-btn",
					prevEl: ".custom-prev-btn"
				},
				pagination: {
					el: '.swiper-pagination',
					clickable: true, // Enable navigation through clicking on pagination bullets
				},

		});
	</script>
</body>
</html>
  
