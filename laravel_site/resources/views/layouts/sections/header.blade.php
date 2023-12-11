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
				<a href="{{ url('/') }}" class="no-decor">
					<div class="banner-header ratio ratio-1x1">
						<img src="{{ asset('assets/images/banners/header-banner.png') }}" alt="banner">
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
									<li><a class="dropdown-item drop-link" href="#">Visa</a></li>
									<li><a class="dropdown-item drop-link" href="#">5 Years</a></li>
									<li><a class="dropdown-item drop-link" href="#">Airport Services</a></li>
									<li><a class="dropdown-item drop-link" href="#">E sim</a></li>
									<li><a class="dropdown-item drop-link" href="#">Extend Visa</a></li>
								</ul>
							</li>
							<li class="nav-item">
								<a class="nav-link active" aria-current="page" href="{{ url('/news') }}">News</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">Travel</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link" href="{{ url('/contact') }}">Contact</a>
							</li>
						</ul>
						<form class="d-flex" role="search">
							<div class="search-input d-flex border border-white rounded-2 me-lg-4">
								<input class="me-2 bg-red-primary ps-4 text-white border-0 rounded-2" type="search" placeholder="Search" aria-label="Search">
								<button class="btn py-1" type="submit"><i class="fal fa-search fs-4"></i></button>
							</div>
						</form>
					</div>
				</div>
			</nav>
		</div>
	</div>
</header>

