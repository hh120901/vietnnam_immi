@extends('layouts.app')

@section('content')
	<section>
		<div class="container">
			<div class="mx-sm-4 mb-5">
				<h2 class="fw-bold">News</h2>
			</div>
			<div class="row px-0 mx-sm-4 mb-5">
				<div class="col-lg-8 px-sm-0">
					<div class="posts me-lg-4">
						<div class="post mb-5 pb-3">
							<a class="no-decor" href="{{ url('/post-details') }}">
								<div class="post-featured ratio ratio-1x1 position-relative overflow-hidden">
									<img class="brightness" src="{{ asset('assets/images/posts/news01.png') }}" alt="featured-image">
								</div>
								<div class="post-meta mb-4">
									<h4 class="post-title my-4 fw-semibold">
										TITLE FOR THIS BLOG - LOREM IPSUM DOLOR SIT AMET
									</h4>
									<p class="fw-semibold">Author Name: Jane Doe</p>
									<p>Author Information: lorem ipsum dolor sit</p>
								</div>
								<div class="post-excerpt">
									<p class="lh-30">
										Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
									</p>
								</div>
							</a>
						</div>

						<div class="post mb-5 pb-3">
							<a class="no-decor" href="#">
								<div class="post-featured ratio ratio-1x1 position-relative overflow-hidden">
									<img class="brightness" src="{{ asset('assets/images/posts/news01.png') }}" alt="featured-image">
								</div>
								<div class="post-meta mb-4">
									<h4 class="post-title my-4 fw-semibold">
										TITLE FOR THIS BLOG - LOREM IPSUM DOLOR SIT AMET
									</h4>
									<p class="fw-semibold">Author Name: Jane Doe</p>
									<p>Author Information: lorem ipsum dolor sit</p>
								</div>
								<div class="post-excerpt">
									<p class="lh-30">
										Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
									</p>
								</div>
							</a>
						</div>

						<div class="post mb-5 pb-3">
							<a class="no-decor" href="#">
								<div class="post-featured ratio ratio-1x1 position-relative overflow-hidden">
									<img class="brightness" src="{{ asset('assets/images/posts/news01.png') }}" alt="featured-image">
								</div>
								<div class="post-meta mb-4">
									<h4 class="post-title my-4 fw-semibold">
										TITLE FOR THIS BLOG - LOREM IPSUM DOLOR SIT AMET
									</h4>
									<p class="fw-semibold">Author Name: Jane Doe</p>
									<p>Author Information: lorem ipsum dolor sit</p>
								</div>
								<div class="post-excerpt">
									<p class="lh-30">
										Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
									</p>
								</div>
							</a>
						</div>
						
					</div>
				</div>
				<div class="col-lg-4 px-sm-0">
					@include('layouts.sections.helpbox')

					<div class="d-flex justify-content-end mt-5">
						<div class="related-posts">
							<h4 class="fw-bold mb-5">Related Posts</h4>
							<div class="related-post">
								<a class="no-decor" href="#">
									<div class="related-post-featured mb-3 ratio ratio-1x1 position-relative overflow-hidden">
										<img class="brightness" src="{{ asset('assets/images/posts/related1.png') }}" alt="featured-image">
									</div>
									<div class="related-post-meta">
										<p class="small related-post-cat mb-2 fw-medium">Visa Service</p>
										<h4 class="related-post-tilte fw-bold">Lorem Ipsum</h4>
									</div>
									<div class="related-post-excerpt">
										<p class="lh-30">
											Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
										</p>
									</div>
								</a>
							</div>
							<hr class="my-4">
							<div class="related-post">
								<a class="no-decor" href="#">
									<div class="related-post-meta">
										<p class="small related-post-cat mb-2 fw-medium">Travel</p>
										<h4 class="related-post-tilte fw-bold">Lorem Ipsum</h4>
									</div>
									<div class="related-post-excerpt">
										<p class="lh-30">
											Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
										</p>
									</div>
								</a>
							</div>
							<hr class="my-4">
							<div class="related-post">
								<a class="no-decor" href="#">
									<div class="related-post-meta">
										<p class="small related-post-cat mb-2 fw-medium">Airport Service</p>
										<h4 class="related-post-tilte fw-bold">Lorem Ipsum</h4>
									</div>
									<div class="related-post-excerpt">
										<p class="lh-30">
											Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
										</p>
									</div>
								</a>
							</div>
							<hr class="my-4">
							<div class="related-post">
								<a class="no-decor" href="#">
									<div class="related-post-meta">
										<p class="small related-post-cat mb-2 fw-medium">News</p>
										<h4 class="related-post-tilte fw-bold">Lorem Ipsum</h4>
									</div>
									<div class="related-post-excerpt">
										<p class="lh-30">
											Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
										</p>
									</div>
								</a>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection