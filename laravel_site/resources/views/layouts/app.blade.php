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
</head>
<body>
	@include('layouts/sections/header')
	@yield('content')
	@include('layouts/sections/footer')
	@include('layouts/sections/scripts')
</body>
</html>