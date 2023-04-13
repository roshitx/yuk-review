@extends('auth.layouts.main')
@section('content')
	<div class="col-lg-12 mb-5 mt-5">
		@if (session('success'))
			<div class="alert alert-success" role="alert">
				{{ session('success') }}
			</div>
			<script>
				Swal.fire({
					icon: 'success',
					title: 'Success',
					text: '{{ session('success') }}',
				});
			</script>
		@endif
		@if (session('error'))
			<div class="alert alert-success" role="alert">
				{{ session('error') }}
			</div>
			<script>
				Swal.fire({
					icon: 'error',
					title: 'Failed',
					text: '{{ session('error') }}',
				});
			</script>
		@endif
		<div class="card mb-3 shadow-lg">
			<div class="card-header text-bg-warning">
				<h5 class="card-title mb-0">Edit Movie {{ $movie->title }}</h5>
			</div>
			<div class="card-body">
				<form action="{{ route('movie.update', ['id' => $movie]) }}" method="POST" enctype="multipart/form-data">
					@csrf
					<input type="text" name="id" value="{{ $movie->id }}" hidden>
					<div class="mb-3">
						<label for="title">Title</label>
						<input type="text" value="{{ $movie->title }}" id="title" name="title" class="form-control">
					</div>
					<div class="mb-3">
						<label for="genre">Genre</label>
						<input type="text" value="{{ $movie->genre }}" id="genre" name="genre" class="form-control">
					</div>
					<div class="mb-3">
						<label for="duration">Duration</label>
						<input type="text" value="{{ $movie->duration }}" id="duration" name="duration" class="form-control">
					</div>
					<div class="mb-3">
						<label for="year">Year Release</label>
						<input type="text" value="{{ $movie->year }}" id="year" name="year" class="form-control">
					</div>
					<div class="mb-3">
						<label for="synopsis">Synopsis</label>
						<textarea name="synopsis" id="synopsis" cols="30" rows="10" class="form-control">{{ $movie->synopsis }}</textarea>
					</div>
					<div class="mb-3">
						<label for="poster">Poster (URL)</label>
						<img src="{{ $movie->poster }}" alt="{{ $movie->title }} poster" width="100" class="d-block">
						<input type="text" value="{{ $movie->poster }}" id="poster" name="poster" class="form-control mt-2">
					</div>
					<div class="mb-3">
						<label for="trailer">Trailer (URL)</label>
						<input type="text" value="{{ $movie->trailer }}" id="trailer" name="trailer" class="form-control">
					</div>
					<div class="mb-3">
						<label for="rating">Rating</label>
						<select name="rating" id="rating" class="form-select">
							@for ($i = 1; $i <= 10; $i++)
								<option value="{{ $i }}" {{ $movie->rating == $i ? 'selected' : '' }}>★ {{ $i }}
								</option>
							@endfor
						</select>
					</div>
					<div class="d-flex justify-content-between mb-3">
						<a href="{{ route('manage.movies') }}" class="btn btn-danger"><i class="fa-solid fa-arrow-left"></i> Back</a>
						<button type="submit" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i> Edit</button>
					</div>
				</form>
			</div>

		</div>
	</div>
@endsection
