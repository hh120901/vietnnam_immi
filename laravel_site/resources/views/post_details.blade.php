@extends('layouts.app')

@section('content')
	<section>
		<div class="container">
			<div class="mx-sm-4 mb-5">
				<h2 class="fw-bold">{{ $post->title }}</h2>
			</div>
			<div class="row px-0 mx-sm-4 mb-5">
				<div class="col-lg-8 px-sm-0">
					<div class="me-lg-4">
						<div class="content w-100 mb-5">
							<div class="img-featured position-relative overflow-hidden mb-4">
								<img class="brightness" src="{{ asset('storage/'.$post->featured_image) }}" alt="featured-image">
							</div>
							<div class="lh-30">
								{!! $post->description !!}
							</div>
						</div>
						<div class="related-link">
							<h2 class="fw-bold mb-4">Relatied Link</h2>
							<ol class="list-related-link">
								@foreach ($other_posts as $o_post)
									<li class="mb-3"><a class="text-second fw-medium text-oneline" href="{{ url('/'.$post->cat_alias.'/'.$o_post->slug) }}">{{ $o_post->title }}</a></li>
								@endforeach
							</ol>
							<div class="d-flex mb-4">
								{{ $other_posts->render(); }}
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