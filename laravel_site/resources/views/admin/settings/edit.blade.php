@extends('layouts.admin')

@section('content')
	<div class="">
		<div>
			<div class="px-5 pt-5">
				<h4 class="ms-5 fw-bold text-red-primary mb-3">Settings</h4>
				<form action="" enctype="multipart/form-data" name="adminForm" id="form-admin" method="POST" class="custom-form mb-5">
					@csrf
					<input type="hidden" id="task" name="task" value="{{ $request->input('task') }}">
					<div class="border rounded-3 px-3 py-4 mx-5 bg-white">
						<div class="row">
							<div class="col-lg-6">
								<div class="px-3">
									<div class="mb-4">
										<label for="company_name">
											<h6 class="small fw-bold mb-3">Company Name <span class="text-danger">*</span></h6>
										</label>
										<input type="text" id="company_name" name="company_name" class="rounded-4 custom-input required bg-white" placeholder="" value="{{ $setting->company_name }}">
										<span class="input-error fw-semibold text-danger d-none">This field is required!</span>
									</div>
									<div class="mb-4">
										<label for="company_phone">
											<h6 class="small fw-bold mb-3">Company Phone < <span class="text-danger">*</span></h6>
										</label>
										<input type="text" id="company_phone" name="company_phone" class="rounded-4 custom-input required bg-white" placeholder="" value="{{ $setting->company_phone }}">
										<span class="input-error fw-semibold text-danger d-none">This field is required!</span>
									</div>
									<div class="mb-4">
										<label for="company_email">
											<h6 class="small fw-bold mb-3">Company Mail <span class="text-danger">*</span></h6>
										</label>
										<input type="text" id="company_email" name="company_email" class="rounded-4 custom-input required bg-white" placeholder="" value="{{ $setting->company_email }}">
										<span class="input-error fw-semibold text-danger d-none">This field is required!</span>
									</div>
									<div class="mb-4">
										<label for="company_address">
											<h6 class="small fw-bold mb-3">Company Address <span class="text-danger">*</span></h6>
										</label>
										<input type="text" id="company_address" name="company_address" class="rounded-4 custom-input required bg-white" placeholder="" value="{{ $setting->company_address }}">
										<span class="input-error fw-semibold text-danger d-none">This field is required!</span>
									</div>
								</div>
							</div>

							<div class="col-lg-6">
								<div class="px-3">
									<div class="mb-4">
										<label for="hr_email">
											<h6 class="small fw-bold mb-3">Hr email <span class="text-danger">*</span></h6>
										</label>
										<input type="text" id="hr_email" name="hr_email" class="rounded-4 custom-input required bg-white" placeholder="" value="{{ $setting->hr_email }}">
										<span class="input-error fw-semibold text-danger d-none">This field is required!</span>
									</div>
									<div class="mb-4">
										<label for="cs_email">
											<h6 class="small fw-bold mb-3">Cs email <span class="text-danger">*</span></h6>
										</label>
										<input type="text" id="cs_email" name="cs_email" class="rounded-4 custom-input required bg-white" placeholder="" value="{{ $setting->cs_email }}">
										<span class="input-error fw-semibold text-danger d-none">This field is required!</span>
									</div>
									<div class="mb-4">
										<label for="logo">
											<h6 class="small fw-bold mb-3">Logo <span class="text-danger">*</span></h6>
										</label>
										<div class="d-flex justify-content-center px-0">
											<div class="box-avatar ratio ratio-1x1 drop-zone">
												<img class="previewImage" src="{{ !empty($setting->logo) ? asset('storage/'.$setting->logo) : asset('assets/images/img-blank.jpg') }}" alt="site_logo">
											</div>
											<input type="file" name="logo" id="logo" accept="image/*" class="d-none input-file">
										</div>
									</div>
									
								</div>
							</div
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