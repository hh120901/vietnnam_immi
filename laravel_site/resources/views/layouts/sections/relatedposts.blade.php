@php
	$latest_posts = \App\Models\Post::where('active', 1)->orderByDesc('created_at')->limit(5)->get();
@endphp
<div class="related-posts">
	<h4 class="fw-bold mb-5">Latest Posts</h4>
	@if (count($latest_posts))
		@foreach ($latest_posts as $i => $latest_post)
			@php
				$post_category = $latest_post->category;
			@endphp
			<div class="related-post">
				<a class="no-decor" href="">
					@if ($i == 0)
						<div class="related-post-featured mb-3 ratio ratio-1x1 position-relative overflow-hidden">
							<img class="brightness" src="{{ asset('storage/'.$latest_post->featured_image) }}" alt="featured-image">
						</div>
					@endif
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
		@endforeach
	@endif
</div>