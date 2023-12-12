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
										<label for="hotline_vn">
											<h6 class="small fw-bold mb-3">Hotline VN <span class="text-danger">*</span></h6>
										</label>
										<input type="text" id="hotline_vn" name="hotline_vn" class="rounded-4 custom-input required bg-white" placeholder="" value="{{ $setting->hotline_vn }}">
										<span class="input-error fw-semibold text-danger d-none">This field is required!</span>
									</div>
									<div class="mb-4">
										<label for="hotline_en">
											<h6 class="small fw-bold mb-3">Hotline EN <span class="text-danger">*</span></h6>
										</label>
										<input type="text" id="hotline_en" name="hotline_en" class="rounded-4 custom-input required bg-white" placeholder="" value="{{ $setting->hotline_en }}">
										<span class="input-error fw-semibold text-danger d-none">This field is required!</span>
									</div>
									<div class="mb-4">
										<label for="hotline_usa">
											<h6 class="small fw-bold mb-3">Hotline USA <span class="text-danger">*</span></h6>
										</label>
										<input type="text" id="hotline_usa" name="hotline_usa" class="rounded-4 custom-input required bg-white" placeholder="" value="{{ $setting->hotline_usa }}">
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
										<label for="cs_email">
											<h6 class="small fw-bold mb-3">Cs email <span class="text-danger">*</span></h6>
										</label>
										<input type="text" id="cs_email" name="cs_email" class="rounded-4 custom-input required bg-white" placeholder="" value="{{ $setting->cs_email }}">
										<span class="input-error fw-semibold text-danger d-none">This field is required!</span>
									</div>
									<div class="mb-4">
										<label for="whatsapp">
											<h6 class="small fw-bold mb-3">Whats app <span class="text-danger">*</span></h6>
										</label>
										<input type="text" id="whatsapp" name="whatsapp" class="rounded-4 custom-input required bg-white" placeholder="" value="{{ $setting->whatsapp }}">
										<span class="input-error fw-semibold text-danger d-none">This field is required!</span>
									</div>
									<div class="mb-4">
										<label for="skype">
											<h6 class="small fw-bold mb-3">Skype <span class="text-danger">*</span></h6>
										</label>
										<input type="text" id="skype" name="skype" class="rounded-4 custom-input required bg-white" placeholder="" value="{{ $setting->skype }}">
										<span class="input-error fw-semibold text-danger d-none">This field is required!</span>
									</div>
									<div class="mb-4">
										<label for="viber">
											<h6 class="small fw-bold mb-3">Viber <span class="text-danger">*</span></h6>
										</label>
										<input type="text" id="viber" name="viber" class="rounded-4 custom-input required bg-white" placeholder="" value="{{ $setting->viber }}">
										<span class="input-error fw-semibold text-danger d-none">This field is required!</span>
									</div>
									<div class="mb-4">
										<label for="telegram">
											<h6 class="small fw-bold mb-3">Telegram <span class="text-danger">*</span></h6>
										</label>
										<input type="text" id="telegram" name="telegram" class="rounded-4 custom-input required bg-white" placeholder="" value="{{ $setting->telegram }}">
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