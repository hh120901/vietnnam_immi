@php
	$visa_cat = \App\Models\PostCategory::where('alias', 'visa')->first();
	$visa_posts = $visa_cat->activePosts->sortBy('created_at')->take(5);
@endphp

<div class=" d-flex justify-content-center justify-content-lg-end mt-5">
	<div class="help-box">
		<div class="bg-dark mx-4">
			<h5 class="text-white py-2 text-center fw-semibold text-uppercase mt-3">
				Vietnam Visa News
			</h5>	
		</div>
		<div class="mx-4 my-4">
			<ol class="">
				@foreach ($visa_posts as $vs_post)
					<li class="mb-3"><a class="text-second fw-medium text-oneline" href="{{ url('/'.$visa_cat->alias.'/'.$vs_post->slug) }}">{{ $vs_post->title }}</a></li>
				@endforeach
			</ol>
		</div>
	</div>
</div>