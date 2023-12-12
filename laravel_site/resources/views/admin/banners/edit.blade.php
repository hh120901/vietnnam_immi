@extends('layouts.admin')

@section('content')
	<div class="">
		<div>
			<div class="px-5 pt-5">
				<h4 class="ms-5 fw-bold text-red-primary mb-3">Banner Details</h4>
				<form action="" enctype="multipart/form-data" name="adminForm" id="form-admin" method="POST" class="custom-form mb-5">
					<div class="border rounded-3 px-3 py-4 mx-5 bg-white">
						@csrf
						<input type="hidden" id="task" name="task" value="{{ $request->input('task') }}">
						<div class="d-flex justify-content-between align-items-center">
							<span class="fs-5 fw-semibold">Detail</span>
						</div>
						<div class="mt-4 row">
							<div class="col-lg-12">
								<div class="px-3">
									<div class="mb-4">
										<label for="name">
											<h6 class="small fw-bold mb-3">Name <span class="text-danger">*</span></h6>
										</label>
										<input type="text" id="name" name="name" class="rounded-4 custom-input required bg-white" value="{{ $banner->name }}" placeholder="">
										<span class="input-error fw-semibold text-danger d-none">This field is required!</span>
									</div>
									<div class="mb-4">
										<label for="url">
											<h6 class="small fw-bold mb-3">Url <span class="text-danger">*</span></h6>
										</label>
										<input type="text" id="url" name="url" class="rounded-4 custom-input required bg-white" value="{{ $banner->url }}" placeholder="">
										<span class="input-error fw-semibold text-danger d-none">This field is required!</span>
									</div>
									<div class="mb-4">
										<label for="parent_id">
											<h6 class="small fw-bold mb-3">Position <span class="text-danger">*</span></h6>
										</label>
										<select class="form-select custom-select" name="position" id="position">
											<option value="">None</option>
											<option value="header" {{ $banner->position == 'header' ? 'selected' : '' }}>Header</option>
											<option value="homepage" {{ $banner->position == 'homepage' ? 'selected' : '' }}>Home Page</option>
										</select>
									</div>
								</div>
							</div>
							<div class="col-lg-12 position-relative overflow-hidden mb-4">
								<div class="input-upload-image px-3" role="button">
									<label class="fw-semibold mb-3" for="">Image <span class="text-danger">*</span></label>
									<div class="drop-zone image-zone ratio ratio-1x1 rounded-3 bg-secondary bg-opacity-10  position-relative overflow-hidden" style="height: 435px">
										<div class="d-flex flex-column justify-content-center align-items-center {{ !empty($banner->image) ? 'd-none' : '' }}">
											<p class="mb-2"><i class="fal fa-file-upload fs-3"></i></p>
											<p>Drop file or click here to upload image</p>
										</div>
										<img class="rounded-3 previewImage {{ empty($banner->image) ? 'd-none' : '' }}" src="{{ !empty($banner->image) ? asset('storage/'.$banner->image) : '' }}" alt="">
									</div>
								</div>
								<p class="file-name my-3 fw-semibold text-red-primary d-none"></p>
								<input type="hidden" name="check_empty_image" id="check_empty_image" value="{{ !empty($banner->image) ? 'excisted' : '' }}">
								<input type="file" name="featured_image" id="featured_image" accept="image/*" class="d-none input-file required">
							</div>
							<div>
								<p class="mb-2 fw-semibold">
									If you would like to publish this banner right now, please check box here!
								</p>
								<div class="form-check">
									<input class="form-check-input"type="checkbox" value="1" id="active" name="active" {{ $banner->active == 1 ? 'checked' : '' }}>
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