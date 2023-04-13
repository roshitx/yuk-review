@extends('auth.layouts.main')

@section('content')
	<div class="col-lg-12 mb-5 mt-5">
		<h1 class="mb-4">Manage Movies</h1>
		<div class="row">
			<div class="col-md-6">
				<div class="card mb-3 shadow-lg">
					<div class="card-header">
						<h5 class="card-title mb-0">Scrapping Data from IMDb</h5>
					</div>
					<div class="card-body">
						<form method="POST" action="{{ route('scrap.movie') }}" id="form-scrapper">
							@csrf
							<div class="form-group">
								<label for="imdbUrl" class="form-label">Put IMDb link</label>
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
					<script>
						Swal.fire({
							icon: 'error',
							title: 'Fail',
							text: '{{ session('error') }}',
						});
					</script>
				@endif
			</div>
			<div class="col-md-6">
				<div class="card mb-3 shadow-lg">
					<div class="card-header">
						<h5 class="card-title mb-0">Add Movie Manually</h5>
					</div>
					<div class="card-body">
						<form action="{{ route('movie.add') }}" method="POST">
							@csrf
							<div class="mb-3">
								<label for="title">Title</label>
								<input type="text" id="title" name="title" class="form-control" placeholder="Example : Interstellar">
							</div>
							<div class="mb-3">
								<label for="genre">Genre</label>
								<input type="text" id="genre" name="genre" class="form-control" placeholder="Example : Scifi / Drama">
							</div>
							<div class="mb-3">
								<label for="duration">Duration</label>
								<input type="text" id="duration" name="duration" class="form-control" placeholder="Example : 169 min">
							</div>
							<div class="mb-3">
								<label for="year">Year Release</label>
								<input type="text" id="year" name="year" class="form-control" placeholder="Example : 2014">
							</div>
							<div class="mb-3">
								<label for="synopsis">Synopsis</label>
								<textarea name="synopsis" id="synopsis" cols="30" rows="10" class="form-control" placeholder="Write a synopsis here..."></textarea>
							</div>
							<div class="mb-3">
								<label for="poster">Poster (URL)</label>
								<input type="text" id="poster" name="poster" class="form-control" placeholder="Example : amazon.com/images/M/MV5BZjdkOTU3MDktN2IxOS00OGEyLWFmMjktY2FiMmZkNWIyODZiXkEyXkFqcGdeQXVyMTMxODk2OTU@._V1_UY1200_CR90,0,630,1200_AL_.jpg">
							</div>
							<div class="mb-3">
								<label for="trailer">Trailer (URL)</label>
								<input type="text" id="trailer" name="trailer" class="form-control" placeholder="Example : https://www.imdb.com/video/imdb/vi1586278169/imdb/embed">
							</div>
							<div class="mb-3">
								<label for="rating_count">Rating Count</label>
								<input type="text" id="rating_count" name="rating_count" class="form-control" placeholder="Example : 1888905">
							</div>
							<div class="mb-3">
								<label for="rating">Rating</label>
								<select name="rating" id="rating" class="form-select">
									@for ($i = 1; $i <= 10; $i++)
										<option value="{{ $i }}">★ {{ $i }}
										</option>
									@endfor
								</select>
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

	<div class="col-lg-12 mb-5 mt-5">
		<div class="row">
			<div class="col-md-12">
				<div class="card mb-3 shadow-lg">
					<div class="card-header">
						<h5 class="card-title mb-0">All Movies</h5>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table-striped table" id="myTable">
								<thead>
									<tr>
										<th>No</th>
										<th>Poster</th>
										<th>Title</th>
										<th>Genre</th>
										<th>Duration</th>
										<th>Year</th>
										<th>Synopsis</th>
										<th>Rating</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($movies as $movie)
										<tr>
											<td>{{ $loop->iteration }}</td>
											<td><img src="{{ $movie->poster }}" height="100" /></td>
											<td>{{ $movie->title }}</td>
											<td>{{ $movie->genre }}</td>
											<td>{{ $movie->duration }}</td>
											<td>{{ $movie->year }}</td>
											<td>{{ $movie->synopsis }}</td>

											<td>{{ $movie->rating }}/10</td>
											<td>
												<a href="/detail/{{ $movie->id }}" class="btn btn-info"><i class="fa-solid fa-eye"
														style="color: #fff;"></i></a>
												<a href="{{ route('movie.edit', ['id' => $movie->id]) }}" class="btn btn-warning mt-2"><i
														class="fa-solid fa-pen-to-square" style="color: #fff;"></i></a>
												<form id="delete-movie-form-{{ $movie->id }}" action="{{ route('movie.delete', ['id' => $movie->id]) }}" method="POST">
													@csrf
													@method('DELETE')
													<button type="submit" onsubmit="return confirm('Are you sure you want to delete this movie?')" class="btn btn-danger mt-2"><i class="fa-solid fa-trash"
															style="color: #fff;"></i></button>
												</form>
											</td>
										</tr>
									@endforeach
									<script>
									</script>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function() {
			$('#myTable').DataTable();
		});
	</script>
@endsection
