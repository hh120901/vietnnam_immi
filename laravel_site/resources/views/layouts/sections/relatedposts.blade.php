@php 
	$latest_posts = array();
	$postCategories = \App\Models\PostCategory::where('active', 1)->get();
	foreach ($postCategories as $postCat) {
		$newPost = \App\Models\Post::where('category_id', $postCat->id)->where('active', 1)->orderByDesc('created_at')->first();
		$latest_posts[] = $newPost;
	}
	$renderImg = true;
@endphp
<div class="related-posts">
	<h4 class="fw-bold mb-5">Latest Posts</h4>
	@foreach ($latest_posts as $i => $latest_post)
		@if (!empty($latest_post))
		<div class="related-post">
			<a class="no-decor" href="">
				@if ($renderImg)
					@php
						$renderImg = false;
					@endphp
					<div class="related-post-featured mb-3 ratio ratio-1x1 position-relative overflow-hidden">
						<img class="brightness" src="{{ asset('storage/'.$latest_post->featured_image) }}" alt="featured-image">
					</div>
				@endif
				<div class="related-post-meta">
					<p class="small related-post-cat mb-2 fw-medium">{{ $latest_post->category->name }}</p>
					<h4 class="related-post-tilte fw-bold">{{ $latest_post->title }}</h4>
				</div>
				<div class="related-post-excerpt">
					<p class="lh-30">
						{!! $latest_post->description !!}
					</p>
				</div>
			</a>
		</div>
		<hr class="my-4">
		@endif
	@endforeach
</div>