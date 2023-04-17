<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	{{-- Bootstrap --}}
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
	{{-- FontAwesome --}}
	<script src="https://kit.fontawesome.com/024c1ae29f.js" crossorigin="anonymous"></script>
	{{-- Font Inter --}}
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
	{{-- SweetAlert --}}
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

	<link rel="icon" type="image/x-icon" href="{{ asset('ico/main.ico') }}">
	<title>YukReview | {{ $title }}</title>
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
		<style>
		.divider:after,
		.divider:before {
			content: "";
			flex: 1;
			border-radius: 5px;
			height: 3px;
			background: #eee;
		}
	</style>
</head>

<body>

	@include('partials.navbar')

	@yield('content')

	@include('partials.footer')

	{{-- Bootstrap --}}
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
	</script>
</body>

</html>
