@extends('auth.layouts.main')

@section('content')
	<div class="col-lg-12 mb-5 mt-5">
		<h1 class="mb-4">Manage Movies</h1>
		<div class="alert alert-primary d-flex align-items-center" role="alert">
			<div>
				<i class="bi bi-info-circle-fill"></i>
				We recommend using the scrapping method instead of adding movies manually because there are currently some bugs.
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="card mb-3 shadow-lg">
					<div class="card-header text-bg-secondary">
						<h5 class="card-title mb-0">Scrapping Data from IMDb</h5>
					</div>
					<div class="card-body">
						<form method="POST" action="{{ route('scrap.movie') }}" id="form-scrapper">
							@csrf
							<div class="form-group">
								<label for="imdbUrl" class="form-label">Put IMDb Link <span class="text-danger">*</span></label>
								<input id="imdbUrl" type="text" class="form-control" name="imdbUrl"
									placeholder="Example : https://www.imdb.com/title/tt4154796/?ref_=ext_shr_lnk">
								<div class="d-flex justify-content-end mt-3 mb-3">
									<button type="submit" id="submit-button" class="btn btn-primary"><i class="fa-solid fa-rotate"></i>
										Scrap</button>
								</div>
							</div>
						</form>
					</div>
				</div>
				@if (session('success'))
					<div class="alert alert-success" role="alert">
						<i class="bi bi-check-circle-fill"></i> {{ session('success') }}
					</div>
					<script>
						Swal.fire({
							icon: 'success',
							title: 'Success',
							text: '{{ session('success') }}',
						});
					</script>
				@elseif (session('error'))
					<div class="alert alert-danger" role="alert">
						<i class="bi bi-x-circle-fill"></i> {{ session('error') }}
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
					<div class="card-header text-bg-secondary">
						<h5 class="card-title mb-0">Add Movie Manually</h5>
					</div>
					<div class="card-body">
						<form action="{{ route('movie.add') }}" method="POST">
							@csrf
							<div class="mb-3">
								<label for="title">Title: <span class="text-danger">*</span></label>
								<input type="text" id="title" name="title" class="form-control" placeholder="Example : Interstellar">
							</div>
							<div class="mb-3">
								<label for="genre">Genre: <span class="text-danger">*</span></label>
								<input type="text" id="genre" name="genre" class="form-control" placeholder="Example : Scifi / Drama">
							</div>
							<div class="mb-3">
								<label for="duration">Duration: <span class="text-danger">*</span></label>
								<input type="text" id="duration" name="duration" class="form-control" placeholder="Example : 169 min">
							</div>
							<div class="mb-3">
								<label for="year">Year Release: <span class="text-danger">*</span></label>
								<input type="text" id="year" name="year" class="form-control" placeholder="Example : 2014">
							</div>
							<div class="mb-3">
								<label for="synopsis">Synopsis: <span class="text-danger">*</span></label>
								<textarea name="synopsis" id="synopsis" cols="30" rows="10" class="form-control"
								 placeholder="Write a synopsis here..."></textarea>
							</div>
							<div class="mb-3">
								<label for="poster">Poster <small>(URL)</small><span class="text-danger">*</span></label>
								<input type="text" id="poster" name="poster" class="form-control"
									placeholder="Example : amazon.com/images/M/MV5BZjdkOTU3MDktN2IxOS00OGEyLWFmMjktY2FiMmZkNWIyODZiXkEyXkFqcGdeQXVyMTMxODk2OTU@._V1_UY1200_CR90,0,630,1200_AL_.jpg">
							</div>
							<div class="mb-3">
								<label for="trailer">Trailer <small>(URL)</small><span class="text-danger">*</span></label>
								<input type="text" id="trailer" name="trailer" class="form-control"
									placeholder="Example : https://www.imdb.com/video/imdb/vi1586278169/imdb/embed">
							</div>
							<div class="mb-3">
								<label for="rating_count">Rating Count: <span class="text-danger">*</span></label>
								<input type="text" id="rating_count" name="rating_count" class="form-control"
									placeholder="Example : 1888905">
							</div>
							<div class="mb-3">
								<label for="rating">Rating: <span class="text-danger">*</span></label>
								<select name="rating" id="rating" class="form-select">
									@for ($i = 1; $i <= 10; $i++)
										<option value="{{ $i }}">★ {{ $i }}
										</option>
									@endfor
								</select>
							</div>
							<div class="d-flex justify-content-end mb-3">
								<button type="submit" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Add</button>
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
					<div class="card-header text-bg-secondary">
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
												<form id="delete-movie-form-{{ $movie->id }}"
													action="{{ route('movie.delete', ['id' => $movie->id]) }}" method="POST">
													@csrf
													@method('DELETE')
													<input type="hidden" name="item_id" value="{{ $movie->id }}">
													<button type="submit"
														class="delete-btn btn btn-danger mt-2"><i class="fa-solid fa-trash" style="color: #fff;"></i></button>
												</form>
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
	<script>
		// Sweetalert success delete
		const deleteButtons = document.querySelectorAll('.delete-btn');

		deleteButtons.forEach(function(button) {
			button.addEventListener('click', function(e) {
				e.preventDefault();

				const itemId = button.parentNode.querySelector('input[name="item_id"]').value;

				Swal.fire({
					title: 'Are you sure?',
					text: "You won't be able to revert this!",
					icon: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Yes, delete it!',
				}).then(function(result) {
					if (result.isConfirmed) {
						Swal.fire(
							'Wait',
							'Your request has been process',
							'warning'
						)
						button.parentNode.submit();
					}
				});
			});
		});


		$(document).ready(function() {
			$('#myTable').DataTable();
		});
	</script>
@endsection
