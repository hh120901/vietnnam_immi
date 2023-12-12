@extends('layouts.admin')

@section('content')
	<div class="">
		<div>
			<div class="px-5 pt-5">
				<h4 class="ms-5 fw-bold text-red-primary mb-3">Category Details</h4>
				<form action="" method="POST" name="adminForm" id="form-admin" class="custom-form">
					<div class="border rounded-3 px-3 py-4 mx-5 bg-white">
						@csrf
						<input type="hidden" id="task" name="task" value="{{ $request->input('task') }}">
						<div class="row">
							<div class="col-lg-6">
								<div class="px-3">
									<div class="mb-4">
										<label for="category_name">
											<h6 class="small fw-bold mb-3">Category Name <span class="text-danger">*</span></h6>
										</label>
										<input type="text" id="category_name" name="category_name" class="rounded-4 custom-input bg-white" placeholder="Enter name" value="{{ $category->name }}" required>
									</div>
									{{--<div class="mb-4">
										<label for="alias">
											<h6 class="small fw-bold mb-3">Category Alias <span class="text-danger">*</span></h6>
										</label>
										<input type="text" id="alias" name="alias" class="rounded-4 custom-input bg-white" placeholder="Enter name" value="{{ $category->alias }}" required>
									</div>--}}
									<div class="mb-4 {{ !empty($category->id) ? 'd-none' : '' }}">
										<label for="level">
											<h6 class="small fw-bold mb-3">Level</h6>
										</label>
										<input type="number" id="level" name="level" class="rounded-4 custom-input bg-white" placeholder="" value="{{ !empty($category->level) ? $category->level : '1' }}">
									</div>
									<div class="mb-4">
										<label for="parent_id">
											<h6 class="small fw-bold mb-3">Parent Category <span class="text-danger">*</span></h6>
										</label>
										<select class="form-select custom-select" name="parent_id" id="parent_id" {{ !empty($category->id) ? 'disabled' : '' }}>
											<option value="">None</option>
												@foreach ($categories as $cat)
													<option value="{{ $cat->id }}" {{ $cat->id == $category->parent_id ? 'selected' : '' }}>{{ $cat->name }}</option>
												@endforeach
										</select>
									</div>
								</div>
							</div>

							<div class="col-lg-12 mb-3">
								<div class="mx-3">
									<label for="title">
										<h6 class="small fw-bold mb-3">Description <span class="text-danger">*</span></h6>
									</label>
									<textarea name="description" id="description" class="custom-textarea bg-white" cols="30" rows="3">{{ $category->description }}</textarea>
								</div>
							</div>
							<div class="mx-3">
								<p class="mb-2">
									If you would like to publish this category right now, please check box here!
								</p>
								<div class="form-check">
									<input class="form-check-input"type="checkbox" value="1" id="active" name="active" {{ $category->active == 1 ? 'checked' : '' }}>
									<label for="active">Publish</label>
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
@endsection