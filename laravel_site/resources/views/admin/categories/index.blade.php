@extends('layouts.admin')

@section('content')
	<div class="">
		<div>
			<form action="" name="adminForm" id="form-admin" method="POST">
				@csrf
				<input type="hidden" name="checkedboxcounter" id="checkedboxcounter" value="0">
				<input type="hidden" id="task" name="task" value="{{ $request->input('task') }}">
				<input type="hidden" id="index_category" name="index_category" value="{{ !empty($parent_category) ? $parent_category->id : '' }}">
				<div class="px-5 pt-5r">
					<h4 class="ms-5 fw-bold text-red-primary mb-3"> {{ !empty($parent_category) ? $parent_category->name : "Category hidden manager" }}</h4>
					<div class="border rounded-3 px-3 py-4 mx-5 bg-white">
						<div class="d-flex flex-wrap justify-content-between align-items-center">
							<span class="fs-5 fw-semibold">Category List</span>
							<div class="input-search-group border rounded-3 d-flex justify-content-center bg-white">
								<input type="text" class="input-search-resources border-0 small rounded-3 ps-3" value="{{ $request->input('search_text') }}"  placeholder="Search..." name="search_text" id="search_text">
								<button class="btn btn-search d-flex justify-content-center align-items-center px-2">
									<img src="{{ asset('assets/images/old_img/search-btn.svg') }}" alt="">
								</button>
							</div>
						</div>
						<div class="mt-4 table-responsive">
							@if (count($categories))
								<table class="table table-bordered rounded-3 table-management table-hover">
									<thead>
										<tr>
											<th scope="col">
												<div class="form-check d-flex justify-content-center">
													<input class="form-check-input btn-check-all" type="checkbox" value="" id="cb">
												</div>
											</th>
											<th class="text-center" scope="col">No</th>
											<th scope="col">Name</th>
											<th scope="col">Parent Category</th>
											<th scope="col">Status</th>
											<th scope="col">Description</th>
											<th scope="col">Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($categories as $i => $category)
											<tr>
												<th scope="col">
													<div class="form-check d-flex justify-content-center">
														<input class="form-check-input checkbox-manage-content" type="checkbox" value="{{ $category->id }}" name="cid[]" id="cb{{ $category->id }}">
													</div>
												</th>
												<th class="text-center" scope="row">{{ $i+1 }}</th>
												<td>{{ $category->name }}</td>
												<td>
													@if (!empty($category->parent_id))
														@php
															$parentCat = \App\Models\PostCategory::find($category->parent_id);
														@endphp
													<span class="fw-medium">{{ !empty($parentCat) ? $parentCat->name : '' }}</span>
													@else 
														<span class="text-muted">None</span>
													@endif
												</td>
												<td class="post-status {{ $category->active == 1 ? 'active' : '' }}">{{ $category->active == 1 ? 'Activated' : 'Deactivated' }}</td>
												<td>{{ $category->description }}</td>
												<td class="">
													<div class="d-flex align-items-center">
														<a href="{{ url('/admin/categories/edit/'.$category->id) }}" class="me-3"><img src="{{ asset('assets/images/old_img/icon-eye.svg') }}" alt=""></a>
														<a role="button" onclick="return confirmBox('Delete items', 'Are you sure you want to delete the selected items?', 'itemTask', ['{{ $category->id }}', 'delete'])"><img src="{{ asset('assets/images/old_img/icon-trash.svg') }}"" alt=""></a>
													</div>
												</td>
											</tr>
										@endforeach
									</tbody>
								</table>
							@endif
							<div class="d-flex justify-content-between mt-4 flex-wrap">
								<div class="custom-pagination">
									{{ $categories->render() }}
								</div>
								<div class="d-flex gap-3">
									<a class="btn btn-outline-red-400 fw-semibold btn-remove-post me-3 btn-delete">
										Delete
									</a>
									@if (empty($parent_category))
										<a href="{{ url('/admin/categories/edit') }}" class="btn btn-red-400 btn-add-post">
											Add new
										</a>
									@else 
										<!-- Button trigger modal -->
										<a role="button" class="btn btn-red-400 btn-add-post" data-bs-toggle="modal" data-bs-target="#modal_add_new_cate">
											Add new
										</a>
									@endif
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>

			<!-- Modal -->
			<div class="modal fade" id="modal_add_new_cate" tabindex="-1" aria-labelledby="label_modal_add_new_cate" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<form action="{{ url('/admin/categories/edit') }}" class="custom-form" name="quick_form" id="quick_form" method="POST">
							@csrf
							<div class="modal-header">
								<h1 class="modal-title fs-5 text-center" id="label_modal_add_new_cate">Add new Category</h1>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<div class="d-flex flex-column">
										<p>Type the name of the category</p>
										<div class="mb-4">
											<input type="text" id="new_category_name" name="new_category_name" class="rounded-3 custom-input bg-white" placeholder="Enter category name" value="" required>
											<input type="hidden" id="quick_task" name="quick_task" value="add_new_cat">
											<input type="hidden" id="new_category_parent_id" name="new_category_parent_id" value="{{ $parent_category->id ?? '' }}">
											<input type="hidden" id="new_category_level" name="new_category_level" value="{{ !empty($parent_category->level) ? $parent_category->level+1 : '' }}">
										</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-red-400 bg-secondary py-2" data-bs-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-red-400 py-2 submit-quick-form">Save</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function () {
			$('.submit-quick-form').on('click', function(){
				$('#quick_form').submit();
			})
		});
	</script>
@endsection