@extends('layouts.app')

@section('content')
	<section>
		<div class="container">
			<div class="mx-sm-4 mb-5">
				<h2 class="fw-bold">{{ !empty($category) ? $category->name : '' }}</h2>
			</div>
			<div class="row px-0 mx-sm-4 mb-5">
				<div class="col-lg-8 px-sm-0">
					@if (count($posts))
						<div class="posts me-lg-4">
							@foreach ($posts as $i => $post)
								<div class="post mb-5 pb-3">
									<a class="no-decor" href="{{ url('/'.$category->alias.'/'.$post->slug) }}">
										<div class="post-featured ratio ratio-1x1 position-relative overflow-hidden">
											<img class="brightness" src="{{ asset('storage/'.$post->featured_image) }}" alt="featured-image">
										</div>
										<div class="post-meta mb-4">
											<h4 class="post-title my-4 fw-semibold">
												{{ $post->title }}
											</h4>
											@php
												$author = \App\Models\User::find($post->user_id);
											@endphp
											<p class="fw-semibold">Author Name: {{ $author->firstname.' '.$author->lastname }}</p>
											<p><i class="fal fa-calendar-alt me-2"></i>{{ $post->created_at->format('H:i d-m-Y') }}</p>
										</div>
										<div class="post-excerpt lh-30">
											{!! $post->description !!}
										</div>
									</a>
								</div>
							@endforeach					
						</div>
						<div>
							{{ $posts->render() }}
						</div>
					@endif
				</div>
				<div class="col-lg-4 px-sm-0">
					@include('layouts.sections.helpbox')

					<div class="d-flex justify-content-center justify-content-lg-end mt-5">
						@include('layouts.sections.relatedposts')
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection