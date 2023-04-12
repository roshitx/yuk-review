@extends('auth.layouts.main')

@section('content')
	<div class="col-lg-10 mb-5 mt-5">
		<h1 class="mb-4">Manage Movies</h1>
		<div class="row">
			<div class="col-md-6">
				<div class="card mb-3 shadow-lg">
					<div class="card-header">
						<h5 class="card-title mb-0">Scrapping Data from IMDB</h5>
					</div>
					<div class="card-body">
						<form method="POST" action="{{ route('scrap.movie') }}" id="form-scrapper">
							@csrf
							<div class="form-group">
								<label for="imdbUrl" class="form-label">Put IMDB link</label>
								<input id="imdbUrl" type="text" class="form-control" name="imdbUrl">
								<div class="d-flex justify-content-end mt-3 mb-3">
									<button type="submit" id="submit-button" class="btn btn-primary">Scrap</button>
								</div>
							</div>
						</form>
					</div>
				</div>
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
					<div class="alert alert-danger" role="alert">
						{{ session('error') }}
					</div>
				@endif
			</div>
			<div class="col-md-6">
				<div class="card mb-3 shadow-lg">
					<div class="card-header">
						<h5 class="card-title mb-0">Add Movie Manually</h5>
					</div>
					<div class="card-body">
						<form action="" method="">
							<div class="mb-3">
								<label for="title">Title</label>
								<input type="text" id="title" name="title" class="form-control">
							</div>
							<div class="mb-3">
								<label for="genre">Genre</label>
								<input type="text" id="genre" name="genre" class="form-control">
							</div>
							<div class="mb-3">
								<label for="duration">Duration</label>
								<input type="text" id="duration" name="duration" class="form-control">
							</div>
							<div class="mb-3">
								<label for="release_date">Release Date</label>
								<input type="text" id="release_date" name="release_date" class="form-control">
							</div>
							<div class="mb-3">
								<label for="synopsis">Synopsis</label>
								<input type="text" id="synopsis" name="synopsis" class="form-control">
							</div>
							<div class="mb-3">
								<label for="poster">Poster (URL)</label>
								<input type="text" id="poster" name="poster" class="form-control">
							</div>
							<div class="mb-3">
								<label for="trailer">Trailer (URL)</label>
								<input type="text" id="trailer" name="trailer" class="form-control">
							</div>
							<div class="mb-3">
								<label for="rating">Rating</label>
								<input type="text" id="rating" name="rating" class="form-control">
							</div>
							<div class="d-flex justify-content-end mb-3">
								<button type="submit" class="btn btn-primary">Add</button>
							</div>
						</form>
					</div>

				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-10 mb-5 mt-5">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0">All Movies</h5>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table-striped table">
								<thead>
									<tr>
										<th>No</th>
										<th>Title</th>
										<th>Genre</th>
										<th>Duration</th>
										<th>Year</th>
										<th>Synopsis</th>
										<th>Poster</th>
										<th>Rating</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($movies as $movie)
										<tr>
											<td>{{ $loop->iteration }}</td>
											<td>{{ $movie->title }}</td>
											<td>{{ $movie->genre }}</td>
											<td>{{ $movie->duration }}</td>
											<td>{{ $movie->year }}</td>
											<td>{{ $movie->synopsis }}</td>
											<td><img src="{{ $movie->poster }}" height="100" /></td>
											<td>{{ $movie->rating }}/10</td>
											<td>
												<a href="/detail/{{ $movie->id }}" class="btn btn-info"><i class="fa-solid fa-eye" style="color: #fff;"></i></a>
												<a href="#" class="btn btn-warning mt-2"><i class="fa-solid fa-pen-to-square"
														style="color: #fff;"></i></a>
												<a href="#" class="btn btn-danger mt-2"><i class="fa-solid fa-trash" style="color: #fff;"></i></a>
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
