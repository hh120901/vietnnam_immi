@extends('layouts.admin')

@section('content')
@php
	$l2_categories = \App\Models\PostCategory::where('parent_id', $category->id)->get();
@endphp
	<div class="">
		<div>
			<div class="px-5 pt-5">
				<h4 class="ms-5 fw-bold text-red-primary mb-3"> {{ $category->name }} ADD NEW</h4>
				<form action="" enctype="multipart/form-data" name="adminForm" id="form-admin" method="POST" class="custom-form mb-5">
					<div class="border rounded-3 px-3 py-4 mx-5 bg-white">
						@csrf
						<input type="hidden" id="task" name="task" value="{{ $request->input('task') }}">
						<div class="d-flex justify-content-between align-items-center">
							<span class="fs-5 fw-semibold">Detail</span>
						</div>
						<div class="mt-4 row">
							<div class="col-lg-6">
								<div class="input-upload-image position-relative" role="button">
									<label class="fw-semibold mb-3" for="">Image <span class="text-danger">*</span></label>
									<div class="drop-zone image-zone ratio ratio-1x1 rounded-3 bg-secondary bg-opacity-10" style="height: 310px">
										<div class="d-flex flex-column justify-content-center align-items-center {{ !empty($post->featured_image) ? 'd-none' : '' }}">
											<p class="mb-2"><i class="fal fa-file-upload fs-3"></i></p>
											<p>Drop file or click here to upload image</p>
										</div>
										<img class="rounded-3 previewImage {{ empty($post->featured_image) ? 'd-none' : '' }}" src="{{ !empty($post->featured_image) ? asset('storage/'.$post->featured_image) : '' }}" alt="">
									</div>
								</div>
								<p class="file-name my-3 fw-semibold text-red-primary d-none"></p>
								<input type="hidden" name="check_empty_image" id="check_empty_image" value="{{ !empty($post->featured_image) ? 'excisted' : '' }}">
								<input type="file" name="featured_image" id="featured_image" accept="image/*" class="d-none input-file required">
							</div>

							<div class="col-lg-6">
								<div class="px-3">
									<div class="mb-4">
										<label for="title">
											<h6 class="small fw-bold mb-3">Title <span class="text-danger">*</span></h6>
										</label>
										<input type="text" id="title" name="title" class="rounded-4 custom-input required bg-white" value="{{ $post->title }}" placeholder="">
										<span class="input-error fw-semibold text-danger d-none">This field is required!</span>
									</div>
									<div class="mb-4">
										<label for="parent_id">
											<h6 class="small fw-bold mb-3">Category <span class="text-danger">*</span></h6>
										</label>
										<select class="form-select custom-select" name="category_id" id="category_id">
											<option value="{{ $category->id }}">Default</option>
											@foreach ($l2_categories as $l2_cat)
												<option value="{{ $l2_cat->id }}" {{ $l2_cat->id == $post->category_id ? 'selected' : '' }}>{{ $l2_cat->name }}</option>
											@endforeach
										</select>
									</div>
								</div>
							</div>

							<div class="col-lg-12 mt-4">
								<div class="mb-4">
									<label for="title">
										<h6 class="small fw-bold mb-3">Description <span class="text-danger">*</span></h6>
									</label>
									<textarea name="description" id="description" class="custom-textarea bg-white tinymce" cols="30" rows="6">{{ $post->description }}</textarea>
								</div>
							</div>
							<div>
								<p class="mb-2 fw-semibold">
									If you would like to publish this blog right now, please check box here!
								</p>
								<div class="form-check">
									<input class="form-check-input"type="checkbox" value="1" id="active" name="active" {{ $post->active == 1 ? 'checked' : '' }}>
									<label for="active">Publish</label>
								</div>
							</div>
						</div>
					</div>
					<div class="d-flex gap-3 justify-content-end me-5 mt-3">
						<a href="{{ url()->previous() }}" class="btn btn-outline-red-400 fw-semibold btn-remove-post me-3">
							Cancle
						</a>
						<button type="button" class="btn btn-red-400 btn-add-post btn-save">
							Save
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection