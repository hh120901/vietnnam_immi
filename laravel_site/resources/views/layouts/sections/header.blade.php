@php
	$settings = \App\Models\Setting::first();
	$banner = \App\Models\Banner::where('position', 'header')->first();
	$services_cat = \App\Models\PostCategory::where('alias', 'services')->first();
	$services_children = \App\Models\PostCategory::where('parent_id', $services_cat->id)->get();
@endphp
<header class="mb-5">
	<div class="site-banner mb-3 container">
		<div class="row h-100 position-relative overflow-hidden">
			<div class="col-lg-4 d-none d-lg-flex align-items-center justify-content-center">
				<a href="{{ url('/') }}" class="no-decor">
					<div class="">
						<h2 class="site-name">Vietnam - immi.org.vn</h2>
					</div>
				</a>
			</div>
			<div class="col-lg-8 h-100">
				<a href="{{ $banner->url }}" class="no-decor">
					<div class="banner-header ratio ratio-1x1">
						<img src="{{ asset('storage/'.$banner->image)}}" alt="banner">
					</div>
				</a>
			</div>
		</div>
	</div>
	<div class="">
		<div class="main-nav container">
			<nav class="navbar navbar-expand-lg bg-red-primary text-white">
				<div class="container-fluid">
					<div class="d-lg-none">
						<h2 class="site-name">Vietnam - immi.org.vn</h2>
					</div>
					<button class="navbar-toggler bg-white ms-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav me-auto mb-2 mb-lg-0">
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								Services
								</a>
								<ul class="dropdown-menu">
									@foreach ($services_children as $services_child)
										<li><a class="dropdown-item drop-link" href="{{ url('/'.$services_child->alias) }}">{{ $services_child->name }}</a></li>
									@endforeach
								</ul>
							</li>
							<li class="nav-item">
								<a class="nav-link active" aria-current="page" href="{{ url('/news') }}">News</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="{{ url('/travel-news') }}">Travel</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link" href="{{ url('/contact') }}">Contact</a>
							</li>
						</ul>
						<form class="d-flex" action="{{ url('/search') }}" method="POST" role="search">
							@csrf
							<div class="search-input d-flex border border-white rounded-2 me-lg-4">
								<input class="me-2 bg-red-primary ps-4 text-white border-0 rounded-2" name="search_text" id="search_text" type="search" placeholder="Search" aria-label="Search" value="{{ $request->input('search_text') }}">
								<button class="btn py-1" type="submit"><i class="fal fa-search fs-4"></i></button>
							</div>
						</form>
					</div>
				</div>
			</nav>
		</div>
	</div>
</header>

