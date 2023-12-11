@extends('layouts.app')

@section('content')
	<section>
		<div class="container">
			<div class="mx-sm-4 mb-5">
				<h2 class="fw-bold">Title of Posts</h2>
			</div>
			<div class="row px-0 mx-sm-4 mb-5">
				<div class="col-lg-8 px-sm-0">
					<div class="me-lg-4">
						<div class="content w-100 mb-5">
							<div class="img-featured position-relative overflow-hidden mb-4">
								<img class="brightness" src="{{ asset('assets/images/posts/news01.png') }}" alt="featured-image">
							</div>
							<p class="lh-30">
								Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
								Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
								Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
								Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
								Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
								Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							</p>
						</div>
						<div class="related-link">
							<h2 class="fw-bold mb-4">Title of Posts</h2>
							<ol class="list-related-link">
								<li class="mb-3"><a class="text-second fw-medium text-oneline" href="#">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</a></li>
								<li class="mb-3"><a class="text-second fw-medium text-oneline" href="#">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</a></li>
								<li class="mb-3"><a class="text-second fw-medium text-oneline" href="#">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</a></li>
								<li class="mb-3"><a class="text-second fw-medium text-oneline" href="#">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</a></li>
								<li class="mb-3"><a class="text-second fw-medium text-oneline" href="#">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</a></li>
							</ol>
							<div class="d-flex justify-content-end">
								<a type="button" class="text-secondary add-more-links fw-bold">
									More links
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 px-sm-0">
					@include('layouts.sections.helpbox')
					@include('layouts.sections.relatedbox')
				</div>
			</div>
		</div>
	</section>
	<script>
		$(document).ready(function () {
			$('.add-more-links').on('click', function(){
				if ($('.list-related-link li').length < 15 ) {
					let links = `
					<li class="mb-3"><a class="text-second fw-medium text-oneline" href="#">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</a></li>
								<li class="mb-3"><a class="text-second fw-medium text-oneline" href="#">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</a></li>
								<li class="mb-3"><a class="text-second fw-medium text-oneline" href="#">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</a></li>
								<li class="mb-3"><a class="text-second fw-medium text-oneline" href="#">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</a></li>
								<li class="mb-3"><a class="text-second fw-medium text-oneline" href="#">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</a></li>
					`
					$('.list-related-link').append(links);
					if ($('.list-related-link li').length >= 15) {
						$('.add-more-links').hide();
					}
				}
			})
		});
	</script>
@endsection