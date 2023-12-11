@extends('layouts.admin')

@section('content')
	<div class="">
		<div>
			<div class="px-lg-5 pt-5">
				<h4 class="ms-5 fw-bold text-red-primary mb-3">ADD NEW</h4>
				<form action="" id="form-admin" name="adminForm" class="custom-form" method="POST" enctype='multipart/form-data'>
					<div class="border rounded-3 px-3 py-4 mx-lg-5 bg-white">
						@csrf
						<input type="hidden" id="task" name="task" value="{{ $request->input('task') }}">
						<div class="row mt-5 me-4">
							<div class="col-lg-3 d-flex justify-content-center px-0">
								<div class="box-avatar ratio ratio-1x1 drop-zone">
									<img class="previewImage" src="{{ !empty($user->avatar) ? asset('storage/'.$user->avatar) : asset('assets/images/img-blank.jpg') }}" alt="avatar">
								</div>
								<input type="file" name="avatar" id="avatar" accept="image/*" class="d-none input-file">
							</div>
							<div class="col-lg-9">
								<div class="row">
									<div class="col-lg-6">
										<div class="mb-4">
											<label for="title">
												<h6 class="small fw-bold mb-3">First name <span class="text-danger">*</span></h6>
											</label>
											<input type="text" id="firstname" name="firstname" class="rounded-4 custom-input bg-white" placeholder="Enter your first name" value="{{ $user->firstname }}">
										</div>
										<div class="mb-4">
											<label for="title">
												<h6 class="small fw-bold mb-3">Email <span class="text-danger">*</span></h6>
											</label>
											<input type="email" id="email" name="email" class="rounded-4 custom-input bg-white" placeholder="Enter your email" value="{{ $user->email }}">
										</div>
										<div class="mb-4">
											<label for="title">
												<h6 class="small fw-bold mb-3">Date of birth <span class="text-danger">*</span></h6>
											</label>
											<input type="date" id="birthday" name="birthday" class="rounded-4 custom-input bg-white" placeholder="dd/mm/yyyy" value="{{ $user->birthday }}">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="mb-4">
											<label for="title">
												<h6 class="small fw-bold mb-3">Last name <span class="text-danger">*</span></h6>
											</label>
											<input type="text" id="lastname" name="lastname" class="rounded-4 custom-input bg-white" placeholder="Enter your last name" value="{{ $user->lastname }}">
										</div>
										<div class="mb-4">
											<label for="title">
												<h6 class="small fw-bold mb-3">Phone <span class="text-danger">*</span></h6>
											</label>
											<input type="text" id="phone" name="phone" class="rounded-4 custom-input bg-white" placeholder="Enter your email" value="{{ $user->phone }}">
										</div>
										<div class="mb-4">
											<label for="category">
												<h6 class="small fw-bold mb-3">Gender <span class="text-danger">*</span></h6>
											</label>
											<select class="form-select custom-select" name="gender" id="gender">
												<option value="1" {{ $user->gender == 1 ? 'selected' : '' }}>Male</option>
												<option value="2"  {{ $user->gender == 2 ? 'selected' : '' }}>Female</option>
											</select>
										</div>
									</div>
									<div class="row">
										<h5 class="fw-bold lh-lg text-red-primary">Password</h5>
										<div class="col-lg-6 pe-lg-0">
											<div class="mb-4">
												<label for="title">
													<h6 class="small fw-bold mb-3">Type a password <span class="text-danger">*</span></h6>
												</label>
												<input type="password" id="password" name="password" value="{{ $user->password }}" class="rounded-4 custom-input bg-white" placeholder="" required>
											</div>
										</div>
										<div class="col-lg-6 d-flex align-items-end px-4">
											<div class="d-flex pb-4">
												<a role="button" class="btn-generate-password">Auto-generate password</a>
												{{--<div class="border-end border-2 mx-3 border-secondary"></div>
												<a role="button" class="btn-choose-password">Choose my specific password.</a>--}}
											</div>
										</div>
									</div>
									<div class="col-lg-6">
										<h5 class="fw-bold lh-lg text-red-primary">Role Info</h5>
										<div class="mb-4">
											<label for="user_role">
												<h6 class="small fw-bold mb-3">User Role <span class="text-danger">*</span></h6>
											</label>
											<select class="form-select custom-select" name="role" id="role" {{ ( auth()->user()->role_id == 9 || auth()->user()->getRole->alias == 'admin' ) ? '' : 'disabled' }}>
												<option>Select role...</option>
												@if (count($roles))
													@foreach ($roles as $role)
														<option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
													@endforeach
												@endif
											</select>
										</div>
									</div>
									<div class="">
										<p class="mb-2 fw-semibold">
											If you want to active this user, please check the box!
										</p>
										<div class="form-check">
											<input class="form-check-input" {{ $user->active == 1 ? 'checked' : '' }} type="checkbox" value="1" id="active" name="active">
											<label for="active">Active</label>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="d-flex gap-3 justify-content-end me-5 mt-3">
						<a href="{{ url()->previous() }}" class="btn btn-outline-red-400 fw-semibold btn-remove-post me-3">
							Cancle
						</a>
						<button type="submit" class="btn btn-red-400 btn-add-post btn-save">
							Save
						</button>
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

			$('.btn-generate-password').on('click', function(){
				let random_pass = generateRandomPassword(10);
				$('#password').attr('type', 'text');
				$('#password').val(random_pass);
			});

			function generateRandomPassword(length) {
			const charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_";

			let password = "";
			for (let i = 0; i < length; i++) {
				const randomIndex = Math.floor(Math.random() * charset.length);
				password += charset.charAt(randomIndex);
			}

			return password;
		}
		});
	</script>
@endsection
