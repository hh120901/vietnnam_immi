@extends('layouts.admin')

@section('content')
	<div class="">
		<div>
			<div class="px-lg-5 pt-5">
				<h4 class="ms-5 fw-bold text-red-primary mb-3">REQUEST DETAIL</h4>
				<form action="" enctype="multipart/form-data" name="adminForm" id="form-admin" method="POST" class="custom-form mb-5">
					@csrf
					<input type="hidden" id="task" name="task" value="{{ $request->input('task') }}">
					{{-- Show Contact Information --}}
					<div class="border rounded-3 px-3 py-4 mx-lg-5 bg-white mb-5">
						<div class="d-flex justify-content-between align-items-center">
							<span class="fs-5 fw-semibold">Contact Information</span>
						</div>
						<div class="mt-4 row">
							<div class="col-lg-6">
								<div class="mb-4">
									<label for="name">
										<h6 class="small fw-bold mb-3">Name </h6>
									</label>
									<input type="text" id="name" name="name" class="rounded-4 custom-input disabled bg-white" value="{{ $contact->name }}" readonly>
								</div>
								<div class="mb-4">
									<label for="name">
										<h6 class="small fw-bold mb-3">Phone number </h6>
									</label>
									<input type="text" id="name" name="name" class="rounded-4 custom-input disabled bg-white" value="{{ $contact->phone }}" readonly>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="mb-4">
									<label for="email">
										<h6 class="small fw-bold mb-3">Email </h6>
									</label>
									<input type="email" id="email" name="email" class="rounded-4 custom-input disabled bg-white" value="{{ $contact->sender }}" readonly>
								</div>
								<div class="mb-4">
									<label for="name">
										<h6 class="small fw-bold mb-3">Request date </h6>
									</label>
									<input type="text" id="name" name="name" class="rounded-4 custom-input disabled bg-white" value="{{ $contact->created_at->format('d-m-Y H:i:s') }}" readonly>
								</div>
							</div>
							<div class="mb-4">
								<label for="title">
									<h6 class="small fw-bold mb-3">Message</h6>
								</label>
								<textarea name="description" id="description" class="custom-textarea bg-white disabled" cols="30" rows="6" readonly>{{ $contact->message }}</textarea>
							</div>
							@if (!empty($contact->attachment))
								@php
									$path = asset('storage/'.$contact->attachment);
									$filename =basename($path);
								@endphp	
								<div class="mb-4">
									<label for="title">
										<h6 class="small fw-bold mb-3">Attach: </h6>
									</label>
									<a href="{{ $path }}" title="View attach detail" target="_blank">View</a>
								</div>
							@endif
						</div>
					</div>
					{{-- Show Reply Information --}}
					<div class="border rounded-3 px-3 py-4 mx-lg-5 bg-white">
						<div class="d-flex justify-content-between align-items-center">
							<span class="fs-5 fw-semibold">Feed Back</span>
						</div>
						<div class="mt-4 row">
							<div class="col-lg-6">
								<div class="mb-4">
									<label for="staff_name">
										<h6 class="small fw-bold mb-3">Staff <span class="text-danger">*</span></h6>
									</label>
									@php
								
										if (!empty($reply)) {
											$staff = \App\Models\User::find($reply->user_id);
										}
									@endphp
									<input type="text" id="staff_name" name="staff_name" class="rounded-4 custom-input disabled bg-white" value="{{ empty($staff) ? (auth()->user()->firstname.' '.auth()->user()->lastname) : $staff->firstname. ' ' . $staff->lastname }}" readonly>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="mb-4">
									<label for="date_reply">
										<h6 class="small fw-bold mb-3">Date <span class="text-danger">*</span></h6>
									</label>
									<input type="datetime" id="date_reply" name="date_reply" class="rounded-4 custom-input disabled bg-white" value="{{ !empty($reply->created_at) ? $reply->created_at->format('d-m-Y H:i') : now()->format('d-m-y') }}" readonly>
								</div>
							</div>
							<div class="mb-4">
								<label for="comment">
									<h6 class="small fw-bold mb-3">Comment <span class="text-danger">*</span></h6>
								</label>
								<textarea name="comment" id="comment" class="custom-textarea bg-white {{ !empty($reply) ? 'disabled' : '' }}" cols="30" rows="6" {{ !empty($reply) ? 'readonly' : '' }}>{{ $reply->message ?? '' }}</textarea>
							</div>
						</div>
					</div>
					<div class="d-flex gap-3 justify-content-end me-5 mt-3">
						@if (!empty($reply))
							<a href="{{ url('/admin/contact') }}" class="btn btn-outline-red-400 fw-semibold btn-remove-post me-3">
								Back
							</a>
						@else
							<a href="{{ url('/admin/contact') }}" class="btn btn-outline-red-400 fw-semibold btn-remove-post me-3">
								Cancle
							</a>
							<button type="submit" class="btn btn-red-400 btn-add-post btn-save">
								Save
							</button>
						@endif
					</div>
				</form>
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function () {
			$('.input-upload-image').on('click', function (){
				$('#featured_image').trigger('click');
			});
		});
	</script>
@endsection