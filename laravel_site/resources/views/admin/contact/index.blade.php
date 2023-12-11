@extends('layouts.admin')

@section('content')
	<div class="">
		<div>
			<form action="" name="adminForm" id="form-admin" method="POST">
				@csrf
				<input type="hidden" name="checkedboxcounter" id="checkedboxcounter" value="0">
				<input type="hidden" id="task" name="task" value="{{ $request->input('task') }}">
				<div class="pt-5r">
					<h4 class="ms-5 fw-bold text-red-primary mb-3">Request Contact Us</h4>
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
							@if(!empty($contacts))
								<table class="table table-bordered rounded-3 table-management">
									<thead>
										<tr>
											<th scope="col">
												<div class="form-check d-flex justify-content-center">
													<input class="form-check-input btn-check-all" type="checkbox" value="">
												</div>
											</th>
											<th class="text-center" scope="col">No</th>
											<th scope="col">Customer's name</th>
											<th scope="col">Email</th>
											<th scope="col">Phone</th>
											<th scope="col">Request Date</th>
											<th scope="col">Status</th>
											<th scope="col">Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($contacts as $i => $contact)
											<tr>
												<th scope="col">
													<div class="form-check d-flex justify-content-center">
														<input class="form-check-input checkbox-manage-content" type="checkbox" name="cid[]" value="{{ $contact->id }}" id="cb{{ $contact->id }}">
													</div>
												</th>
												<th class="text-center" scope="row">{{ $i+1 }}</th>
												<td>{{ $contact->name }}</td>
												<td>{{ $contact->sender }}</td>
												<td>{{ $contact->phone }}</td>
												<td>{{ $contact->created_at->format('d-m-Y H:i:s') }}</td>
												<td class="post-status {{ $contact->active == 1 ? 'active' : '' }}">{{ $contact->active == 1 ? 'Processed' : 'Unread' }}</td>
												<td class="">
													<div class="d-flex align-items-center">
														<a href="{{ url('/admin/contact/edit/'.$contact->id) }}" class="me-3"><img src="{{ asset('assets/images/old_img/icon-eye.svg') }}" alt=""></a>
														<a role="button" onclick="return confirmBox('Delete items', 'Are you sure you want to delete the selected items?', 'itemTask', ['{{ $contact->id }}', 'delete'])"><img src="{{ asset('assets/images/old_img/icon-trash.svg') }}"" alt=""></a>
													</div>
												</td>
											</tr>
										@endforeach
									</tbody>
								</table>
							@endif
							<div class="d-flex justify-content-between mt-4 flex-wrap">
								<div class="custom-pagination">
									{{ $contacts->render() }}
								</div>
								<div class="d-flex gap-3">
									<a class="btn btn-outline-red-400 fw-semibold btn-remove-post me-3 btn-delete">
										Delete
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection