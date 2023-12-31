@extends('layouts.app')

@section('content')
<section>
	<div class="container">
		<div class="row px-0 mb-5 mx-sm-4">
			<div class="col-lg-8 px-sm-0 mb-3">
				<div class="w-100 h-100">
					{{-- Swiper --}}
					<div class="h-100 me-lg-4">
						<div class="swiper mySwiper bg-light">
							<div class="swiper-wrapper">
								@if (empty($homeBanners))
									<div class="swiper-slide ratio ratio-1x1">
										<a href="#">
											<img class="brightness" src="{{ asset('assets/images/banners/slide-banner1.jpg') }}" alt="banner-image">
										</a>
									</div>
								@else
									@foreach ($homeBanners as $banner)
										<div class="swiper-slide ratio ratio-1x1">
											<a href="{{ $banner->url }}">
												<img class="brightness" src="{{ asset('storage/'.$banner->image) }}" alt="banner-image">
											</a>
										</div>
									@endforeach
								@endif
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
				@include('layouts.sections.helpbox')
			</div>
		</div>
		<div class="box-information mx-sm-4 border border-secondary py-4 px-5">
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
		<div class="mx-sm-4 mt-5 pt-3">
			<h2 class="fw-bold mb-4">News of Vietnam Travel</h2>
			<ol>
				@foreach ($travel_news_posts as $travel_post)
					<li class="mb-3"><a class="text-second fw-medium" href="{{ url('/'.$travel_news_posts->cat->alias.'/'.$travel_post->slug) }}">{{ $travel_post->title }}</a></li>
				@endforeach
			</ol>
		</div>

		<div class="mx-sm-4 mt-5 pt-3">
			<h2 class="fw-bold mb-4">News of Vietnam Visa and Airport Services </h2>
			<ol>
				@foreach ($visa_airport_news_posts as $v_a_post)
					<li class="mb-3"><a class="text-second fw-medium" href="{{ url('/'.$visa_airport_news_posts->{$v_a_post->category_id}->alias.'/'.$v_a_post->slug) }}">{{ $v_a_post->title }}</a></li>
					@endforeach
			</ol>
		</div>
	</div>
</section>
<script>
	$(document).ready(function () {
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
	});
</script>
@endsection