@extends('layouts.admin')

@section('content')
	<div class="">
		<div>
			<form action="" name="adminForm" id="form-admin" method="POST">
				@csrf
				<input type="hidden" name="checkedboxcounter" id="checkedboxcounter" value="0">
				<input type="hidden" id="task" name="task" value="{{ $request->input('task') }}">
				<div class="px-5 pt-5r">
					<h4 class="ms-5 fw-bold text-red-primary mb-3">USER ROLES</h4>
					<div class="border rounded-3 px-3 py-4 mx-5 bg-white">
						<div class="d-flex justify-content-between align-items-center">
							<span class="fs-5 fw-semibold">Resources List</span>
							<div class="input-search-group border rounded-3 d-flex justify-content-center bg-white">
								<input type="text" class="input-search-resources border-0 small rounded-3 ps-3" value="{{ $request->input('search_text') }}"  placeholder="Search..." name="search_text" id="search_text">
								<button class="btn btn-search d-flex justify-content-center align-items-center px-2">
									<img src="{{ asset('assets/images/old_img/search-btn.svg') }}" alt="">
								</button>
							</div>
						</div>
						<div class="mt-4 table-responsive">
							@if (!empty($roles))
								<table class="table table-bordered rounded-3 table-management">
									<thead>
										<tr>
											<th scope="col">
												<div class="form-check d-flex justify-content-center">
													<input class="form-check-input btn-check-all" type="checkbox" value="" id="cb">
												</div>
											</th>
											<th class="text-center" scope="col">No</th>
											<th scope="col">Name</th>
											<th scope="col">Created Date</th>
											<th scope="col">Quantity</th>
											<th scope="col">Status</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($roles as $i => $role)
											<tr>
												<th scope="col">
													<div class="form-check d-flex justify-content-center">
														<input class="form-check-input checkbox-manage-content" type="checkbox" value="{{ $role->id }}" name="cid[]" id="cb{{ $role->id }}">
													</div>
												</th>
												<th class="text-center" scope="row">{{ $i+1 }}</th>
												<td>{{ $role->name }}</td>
												<td>{{ $role->created_at->format('d-m-Y H:i:s') }}</td>
												<td>
													@php
														$users = \App\Models\User::where('role_id', $role->id)->get();
													@endphp
													{{ count($users) ?? 0 }}
												</td>
												<td class="post-status {{ $role->active == 1 ? 'active' : '' }}">{{ $role->active == 1 ? 'Activated' : 'Deactivated' }}</td>
											</tr>
										@endforeach
									</tbody>
								</table>
							@endif
							<div class="d-flex justify-content-between mt-4 flex-wrap">
								<div class="custom-pagination">
									{{ $roles->render() }}
								</div>
								<div class="d-flex gap-3">
									{{--<a class="btn btn-outline-red-400 fw-semibold btn-remove-post me-3 btn-delete">
										Delete
									</a>--}}
									@if (auth()->user()->getRole->alias == 'admin') 
										<a href="{{ url('/admin/roles/edit') }}" class="btn btn-red-400 btn-add-post">
											Add new
										</a>
									@endif
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection