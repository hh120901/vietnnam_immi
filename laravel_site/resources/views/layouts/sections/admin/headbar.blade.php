@php
	$new_contacts = \App\Models\MailDB::where('type', 'contact')->where('active', 0)->get();
	$count_contact = count($new_contacts) ?? 0;
@endphp

<div class="head-bar">
	<div class="d-flex align-items-center justify-content-end pe-4 h-100">
		<div class="">
			<button class="btn p-0 me-4 position-relative" data-bs-toggle="dropdown" aria-expanded="false">
				<img class="pt-1" src="{{ asset('assets/images/old_img/icon-notifi.svg') }}" alt="">
				<span class="position-absolute start-100 translate-middle badge rounded-pill bg-danger badge-notifi">
					{{ $count_contact }}
					<span class="visually-hidden">unread messages</span>
				</span>
			</button>
				
			<ul class="dropdown-menu">
				@if (!empty($new_applicants))
					<li><a class="dropdown-item" href="{{ url('/admin/career') }}">New Applicants ({{ count($new_applicants) }})</a></li>
				@endif
				@if (!empty($new_contacts))
					<li><a class="dropdown-item" href="{{ url('/admin/contact') }}">New Request ({{ count($new_contacts) }})</a></li>
				@endif
			  </ul>
		</div>
		<div class="">
			<a href="#" class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle"
				data-bs-toggle="dropdown" aria-expanded="false">
				<div class="ratio ratio-1x1 me-2" style="width: 36px; height: 36px">
					<img src="{{ asset('storage/'.auth()->user()->avatar) }}" alt="avt" class="rounded-circle me-2">
				</div>
				<div class="d-flex flex-column">
					<strong>{{ auth()->user()->firstname}}</strong>
					<p class="small mb-0">{{ auth()->user()->getRole->name ?? 'Root' }}</p>
				</div>
			</a>
			<ul class="dropdown-menu text-small shadow">
				<li><a class="dropdown-item" href="{{ url('/admin/users/edit/'.auth()->user()->id) }}">Profile</a></li>
				<li><a class="dropdown-item" href="{{ route('syslog.logout') }}">Logout</a></li>
			</ul>
		</div>
	</div>
</div>