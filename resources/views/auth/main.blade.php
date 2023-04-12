<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	{{-- Bootstrap css --}}
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script src="https://kit.fontawesome.com/024c1ae29f.js" crossorigin="anonymous"></script>
	<title>{{ $title }} - YukReview</title>

	<!-- Custom styles for this template -->
	<link href="{{ asset('css/auth.css') }}" rel="stylesheet">
</head>

<body>

	@yield('container')

	{{-- Bootstrap --}}
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
		integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
	</script>

  <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
