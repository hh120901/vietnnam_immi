<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="robots" content="index,follow"/>
	<meta name="author" content="{{ env('APP_NAME') }}">
	<title>The One Digi</title>
	@include('layouts/sections/styles')
	<script src="https://cdn.tiny.cloud/1/8bsaqy79a99wm4rtezcizmx33g6z4u1cgomgxoo7c66exlwa/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
	<script>
		tinymce.init({
			selector: '.tinymce',
			plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
			toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
		});
	</script>
</head>
<body>
	<div class="container">
		<div class="d-flex">
			@include('layouts.sections.admin.sidebar')
			<div class="w-100">
				@include('layouts.sections.admin.headbar')
				@yield('content')
			</div>
		</div>
	</div>
	<script src="{{ asset('assets/admin/admin.js') }}"></script>
	@include('layouts/sections/scripts')
</body>
</html>