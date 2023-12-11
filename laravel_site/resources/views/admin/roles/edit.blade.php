@extends('layouts.admin')

@section('content')
	<div class="">
		<div>
			<div class="px-5 pt-5">
				<h4 class="ms-5 fw-bold text-red-primary mb-3">ADD NEW</h4>
				<form action="" enctype="multipart/form-data" name="adminForm" id="form-admin" method="POST" class="custom-form mb-5">
					<div class="border rounded-3 px-3 py-4 mx-5 bg-white">
						@csrf
						<input type="hidden" id="task" name="task" value="{{ $request->input('task') }}">
						<div class="d-flex justify-content-between align-items-center">
							<span class="fs-5 fw-semibold">Detail</span>
						</div>
						<div class="mt-4 row">
							<div class="col-lg-6">
								<div class="">
									<div class="mb-4">
										<label for="name">
											<h6 class="small fw-bold mb-3">Name <span class="text-danger">*</span></h6>
										</label>
										<input type="text" id="name" name="name" class="rounded-4 custom-input required bg-white" value="{{ $role->name }}" placeholder="">
										<span class="input-error fw-semibold text-danger d-none">This field is required!</span>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="">
									<div class="mb-4">
										<label for="alias">
											<h6 class="small fw-bold mb-3">Alias<span class="text-danger">*</span></h6>
										</label>
										<input type="text" id="alias" name="alias" class="rounded-4 custom-input required bg-white" value="{{ $role->alias }}" placeholder="">
										<span class="input-error fw-semibold text-danger d-none">This field is required!</span>
									</div>
								</div>
							</div>

							<div class="col-lg-12 mt-4">
								<div class="mb-4">
									<label for="title">
										<h6 class="small fw-bold mb-3">Description <span class="text-danger">*</span></h6>
									</label>
									<textarea name="description" id="description" class="custom-textarea bg-white tinymce" cols="30" rows="6">{{ $role->description }}</textarea>
								</div>
							</div>

							<div>
								<p class="mb-2 fw-semibold">
									If you would like to publish this role right now, please check box here!
								</p>
								<div class="form-check">
									<input class="form-check-input"type="checkbox" value="1" id="active" name="active" {{ $role->active == 1 ? 'checked' : '' }}>
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