<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	{{-- Bootstrap css --}}
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
	{{-- Bootstrap Icon --}}
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
	{{-- SweetAlert --}}
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	{{-- FontAwesome --}}
	<script src="https://kit.fontawesome.com/024c1ae29f.js" crossorigin="anonymous"></script>
	{{-- Font Inter --}}
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
	{{-- JQuery --}}
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	{{-- Datatables css --}}
	<script src="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css"></script>
	{{-- Datatables js --}}
	<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
	{{-- Datatables Bootstrap --}}
	<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
	{{-- Chart.js --}}
	<script src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>

	<link rel="icon" type="image/x-icon" href="{{ asset('ico/dashboard.ico') }}">
	<title>{{ $title }} - YukReview</title>



	<!-- Custom styles for this template -->
	<link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body style="font-family: 'Inter', sans-serif;">
	@include('auth.partials.header')

	<div class="container-fluid">
		<div class="row">
			@include('auth.partials.sidebars')
			<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
				@yield('content')
			</main>
		</div>
	</div>

	{{-- Bootstrap --}}
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
		integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
	</script>

	<script src="{{ asset('js/dashboard.js') }}"></script>
</body>

</html>
