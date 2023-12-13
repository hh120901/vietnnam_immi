<section class="sidebar">
	@php
		$user = auth()->user();
		$admin_role = ['admin'];
		$hr_role = ['admin', 'hr'];
		$content_role = ['admin', 'content'];
		$cs_role = ['admin', 'cs'];
		$settings = \App\Models\Setting::first();
		$l1_categories = \App\Models\PostCategory::where('level', 1)->get();
	@endphp
	<div>
		<div class="d-flex flex-column flex-shrink-0 p-3 w-100" >
			<a class="no-decor" href="{{ url('/admin') }}">
				<div class="d-flex align-items-center">
					<h4 class="fw-semibold mb-0 text-danger text-nowrap">
						Vietnam - immi.org.vn
					</h4>
				</div>
			</a>
			<hr>
			<div>
				<ul class="group-management mt-2 {{ in_array($user->getRole->alias, $content_role) ? '' : 'd-none' }}"><span class="d-flex align-items-center mb-3"><img class="me-2" src="{{ asset('assets/images/old_img/notes.svg') }}" alt="">Content management</span>
					@foreach ($l1_categories as $l1_cat)
						<li class="management-item"><a class="management-link" href="{{ url('/admin/category/'.$l1_cat->id).'/posts' }}">{{ $l1_cat->name }}</a></li>
					@endforeach
				</ul>
				<ul class="group-management {{ (in_array($user->getRole->alias, $cs_role)) ? '' : 'd-none' }}">
					<span class="d-flex align-items-center mb-3">
						<svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
							<ellipse cx="12" cy="16.5" rx="6" ry="2.5" stroke="#28303F" stroke-width="1.5" stroke-linejoin="round"/>
							<circle cx="12" cy="8" r="3" stroke="#28303F" stroke-width="1.5" stroke-linejoin="round"/>
							<path fill-rule="evenodd" clip-rule="evenodd" d="M6.44547 13.2617C5.20689 13.3133 4.06913 13.5364 3.18592 13.8897C2.68122 14.0915 2.22245 14.3507 1.87759 14.6768C1.53115 15.0045 1.25 15.4514 1.25 16.0002C1.25 16.5491 1.53115 16.996 1.87759 17.3236C2.22245 17.6498 2.68122 17.9089 3.18592 18.1108C3.68571 18.3107 4.26701 18.469 4.90197 18.578C4.40834 18.0455 4.09852 17.4506 4.01985 16.8197C3.92341 16.7872 3.83104 16.7533 3.74301 16.7181C3.34289 16.558 3.06943 16.3862 2.90826 16.2338C2.7498 16.084 2.74999 16.0048 2.75 16.0003L2.75 16.0002L2.75 16.0002C2.74999 15.9956 2.7498 15.9165 2.90826 15.7667C3.06943 15.6142 3.34289 15.4424 3.74301 15.2824C3.94597 15.2012 4.17201 15.1268 4.41787 15.0611C4.83157 14.3712 5.53447 13.7562 6.44547 13.2617Z" fill="#28303F"/>
							<path fill-rule="evenodd" clip-rule="evenodd" d="M19.9803 16.8197C19.9016 17.4506 19.5918 18.0455 19.0982 18.578C19.7331 18.469 20.3144 18.3107 20.8142 18.1108C21.3189 17.9089 21.7777 17.6498 22.1226 17.3236C22.469 16.996 22.7502 16.5491 22.7502 16.0002C22.7502 15.4514 22.469 15.0045 22.1226 14.6768C21.7777 14.3507 21.3189 14.0916 20.8142 13.8897C19.931 13.5364 18.7933 13.3133 17.5547 13.2617C18.4657 13.7562 19.1686 14.3712 19.5823 15.0611C19.8281 15.1268 20.0542 15.2012 20.2571 15.2824C20.6573 15.4424 20.9307 15.6142 21.0919 15.7667C21.2504 15.9165 21.2502 15.9956 21.2502 16.0002V16.0002V16.0003C21.2502 16.0048 21.2504 16.084 21.0919 16.2338C20.9307 16.3862 20.6573 16.558 20.2571 16.7181C20.1691 16.7533 20.0767 16.7872 19.9803 16.8197Z" fill="#28303F"/>
							<path fill-rule="evenodd" clip-rule="evenodd" d="M16.5142 10.1522C16.2943 10.6126 16.0061 11.0341 15.6626 11.4036C16.0584 11.6243 16.5144 11.75 16.9998 11.75C18.5186 11.75 19.7498 10.5188 19.7498 9C19.7498 7.48122 18.5186 6.25 16.9998 6.25C16.8955 6.25 16.7926 6.2558 16.6914 6.26711C16.8634 6.73272 16.9681 7.23096 16.9937 7.75001C16.9957 7.75 16.9978 7.75 16.9998 7.75C17.6902 7.75 18.2498 8.30964 18.2498 9C18.2498 9.69036 17.6902 10.25 16.9998 10.25C16.8276 10.25 16.6635 10.2152 16.5142 10.1522Z" fill="#28303F"/>
							<path fill-rule="evenodd" clip-rule="evenodd" d="M7.30845 6.26711C7.20719 6.2558 7.10427 6.25 7 6.25C5.48122 6.25 4.25 7.48122 4.25 9C4.25 10.5188 5.48122 11.75 7 11.75C7.48537 11.75 7.94138 11.6243 8.33721 11.4036C7.99374 11.0341 7.70549 10.6126 7.4856 10.1522C7.33631 10.2152 7.17222 10.25 7 10.25C6.30964 10.25 5.75 9.69036 5.75 9C5.75 8.30964 6.30964 7.75 7 7.75C7.00205 7.75 7.00409 7.75 7.00614 7.75001C7.0317 7.23096 7.13641 6.73272 7.30845 6.26711Z" fill="#28303F"/>
						</svg>
						User management
					</span>
					<li class="management-item {{ (in_array($user->getRole->alias, $admin_role)) ? '' : 'd-none' }}"><a class="management-link" href="{{ url('/admin/users') }}">User</a></li>
					<li class="management-item {{ (in_array($user->getRole->alias, $admin_role)) ? '' : 'd-none' }}"><a class="management-link" href="{{ url('/admin/roles') }}">User Roles</a></li>
					<li class="management-item {{ (in_array($user->getRole->alias, $cs_role)) ? '' : 'd-none' }}"><a class="management-link" href="{{ url('/admin/contact') }}">Request Contact Us</a></li>
				</ul>
				<ul class="group-management mt-2 {{ in_array($user->getRole->alias, $content_role) ? '' : 'd-none' }}">
					<span class="d-flex align-items-center mb-3"><img class="me-2" src="{{ asset('assets/images/old_img/notes.svg') }}" alt="">Categories management</span>
					@foreach ($l1_categories as $l1_cat)
						<li class="management-item"><a class="management-link" href="{{ url('/admin/categories/index/'.$l1_cat->id) }}">{{ $l1_cat->name }}</a></li>
					@endforeach
				</ul>
				<ul class="group-management mt-2 {{ in_array($user->getRole->alias, $content_role) ? '' : 'd-none' }}">
					<span class="d-flex align-items-center mb-3"><i class="fal fa-image fs-4 me-2"></i>Ads management</span>
						<li class="management-item"><a class="management-link" href="{{ url('/admin/banners/') }}">Banners</a></li>
				</ul>
				<ul class="group-management mt-2 {{ in_array($user->getRole->alias, $admin_role) ? '' : 'd-none' }}">
					<span class="d-flex align-items-center mb-3"><i class="fal fa-cogs fs-4 me-2"></i>Site Managements</span>
						<li class="management-item"><a class="management-link" href="{{ url('/admin/settings/edit') }}">Settings</a></li>
				</ul>
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function () {
			function checkUrl() {
				var urlValue = window.location.href;
				var getItemLink = $('.management-link');
				getItemLink.each(function(){
					let currentItem = $(this);
					if (currentItem.attr('href') == urlValue) {
						$(this).addClass('active');
					} else {
						$(this).removeClass('active');
					}
				})
			}
			checkUrl();
		});
	</script>
</section>