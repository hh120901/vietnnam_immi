@extends('layouts.app')

@section('content')
<section>
	<div class="container">
		
		<div class="row px-0 mx-sm-4 mb-5">
			<div class="col-lg-8 px-sm-0">
				<div class="me-lg-4">
					<div class="">
						<h2 class="fw-bold text-uppercase">Contact Us</h2>
					</div>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
					</p>
					<div>
						<form action="" id="form_contact" name="form_contact" method="POST" enctype="multipart/form-data">
							@csrf
							<div class="mb-4">
								<label for="contact_name">
									<h6 class="fw-bold mb-3">Fullname <span class="text-danger">*</span></h6>
								</label>
								<input type="text" id="contact_name" name="contact_name" class="rounded-1 border-2 form-control custom-input required bg-white" placeholder="Enter your name">
									<span class="text-danger fw-semibold error-input d-none small">* This field is required!</span>
							</div>
							<div class="mb-4">
								<label for="contact_email">
									<h6 class="fw-bold mb-3">Email <span class="text-danger">*</span></h6>
								</label>
								<input type="email" id="contact_email" name="contact_email" class="rounded-1 border-2 form-control custom-input required bg-white" placeholder="Enter your email">
									<span class="text-danger fw-semibold error-input d-none small">* This field is required!</span>
							</div>
							<div class="mb-4 custom-telinput">
								<label for="contact_phone">
									<h6 class="fw-bold mb-3">Phone <span class="text-danger">*</span></h6>
								</label>
								<input type="text" id="contact_phone" name="contact_phone" class="form-control custom-input required rounded-1 border-2 telinput bg-white" >
								<input type="hidden" name="dialcode" id="dialcode" value="">
								<span class="text-danger fw-semibold error-input-phone d-none small">* This field is required!</span>
								<span class="text-danger fw-semibold phone-error small"></span>
							</div>
							<div class="mb-4">
								<label for="contact_subject">
									<h6 class="fw-bold mb-3">Subject <span class="text-danger">*</span></h6>
								</label>
								<input type="text" id="contact_subject" name="contact_subject" class="rounded-1 border-2 form-control custom-input required bg-white" placeholder="Enter your subject">
								<span class="text-danger fw-semibold error-input d-none small">* This field is required!</span>
							</div>
							<div class="mb-4">
								<label for="contact_message">
									<h6 class="fw-bold mb-3">Message <span class="text-danger">*</span></h6>
								</label>
								<textarea id="contact_message" name="contact_message" class="rounded-1 border-2 custom-textarea required area-input form-control bg-white" placeholder="Enter your message"></textarea>
								<span class="text-danger fw-semibold error-input d-none small">* This field is required!</span>
							</div>
							<div class="apply-input-group mb-4">
								<label for="input_file">
									<h6 class="small fw-bold">Attach file (optional)</h6>
								</label>
								<input type="file" id="input_file" name="input_file" accept=".pdf, .jpg, .png, .doc" class="d-none input-file">
								<div class="drop-zone">
									<div class="d-flex flex-column justify-content-center align-items-center border rounded-1 py-4">
										<p class="mb-2"><i class="fal fa-file-upload fs-4"></i></p>
										<p class="fw-semibold mb-0 mx-3">Drag or click here to upload your file (Maximum size: 2MB)</p>
									</div>
								</div>
								<p class="file-name my-3 fw-semibold text-success"></p>
							</div>
							
							<button type="button" class="btn btn-danger form-control rounded-1 btn-submit-contact mb-4">
								Send message
							</button>
						</form>
					</div>
				</div>
			</div>
			<div class="col-lg-4 px-sm-0">
				@include('layouts.sections.helpbox')
			</div>
		</div>
	</div>
</section>
<script>
	$(document).ready(function () {
		let telip =	$('.telinput')
		const errorMap = ["Invalid phone number", "Invalid country code", "Too short", "Too long", "Invalid phone number"];
	
		telip.on('blur', function(){
			$('#dialcode').val(iti.getSelectedCountryData().dialCode);
			if (telip.val() != '') {
				if (telip.val().trim()) {
					if (iti.isValidNumber()) {
						$('.phone-error').html('');
					} else {
						const errorCode = iti.getValidationError();
						errorMsg = errorMap[errorCode];
						$('.phone-error').html(errorMsg);
					}
				}
			}
			else {
				$('.error-input-phone').removeClass('d-none');
			}
		})

		telip.on('focus', function(){
			$('.phone-error').html('');
			$('.error-input-phone').addClass('d-none');
		})

		// form 
		let getInput = $('.custom-input.required');
		let getTextArea = $('.custom-textarea.required');

		getInput.on('blur', function(){
			if ($(this).val() == '') {
				$(this).addClass('error');
				$(this).parent().find('.error-input').removeClass('d-none');
			}
		})

		getInput.on('focus', function(){
			if ($(this).val() == '') {
				$(this).removeClass('error');
				$(this).parent().find('.error-input').addClass('d-none');
			}
		})

		getTextArea.on('blur', function(){
			if ($(this).val() == '') {
				$(this).addClass('error');
				$(this).parent().find('.error-input').removeClass('d-none');
			}
		})

		getTextArea.on('focus', function(){
			if ($(this).val() == '') {
				$(this).removeClass('error');
				$(this).parent().find('.error-input').addClass('d-none');
			}
		})
		
		function checkInput() {
			let flag = true;
			let getAllInput = $('.custom-input.required');
			let getAllTextarea = $('.custom-textarea.required');

			getAllInput.each(function(){
				let targetInput = $(this);
				if (targetInput.val() == '') {
					flag = false;
					targetInput.addClass('error');
					targetInput.parent().find('.error-input').removeClass('d-none');
				}
			});
			getAllTextarea.each(function(){
				let targetInput = $(this);
				if (targetInput.val() == '') {
					flag = false;
					targetInput.addClass('error');
					targetInput.parent().find('.error-input').removeClass('d-none');
				}
			});

			if ($('.phone-error').val() != '' || telip.val() == '' ) {
				
				$('.error-input-phone').removeClass('d-none');
				return flag =false;
			}
			
			return flag;
		}
		$('.btn-submit-contact').on('click', function(){
			let flagCheck = checkInput();
			if (flagCheck) {
				var contactForm = document.getElementById("form_contact");
					contactForm.submit();
			}
		})
	});
</script>
@endsection