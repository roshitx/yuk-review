@extends('layouts.main')

@section('content')
	<div class="waves-1 position-relative">
		<svg class="position-absolute z-n1 top-0 left-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
			<path fill="#E49B0F" fill-opacity="1"
				d="M0,96L60,112C120,128,240,160,360,165.3C480,171,600,149,720,165.3C840,181,960,235,1080,224C1200,213,1320,139,1380,101.3L1440,64L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z">
			</path>
		</svg>
	</div>

	<div class="container">

		<div style="position-relative" class="divider d-flex align-items-center my-4 mt-5">
			<h1 class="fw-bold text-white mx-3 mb-0 text-center">All Movies</h1>
		</div>

		{{-- Search bar --}}
		<form action="{{ route('search.movies') }}" method="GET" class="mb-5">
			<div class="input-group">
				<input type="text" name="search" class="form-control" value="{{ isset($search) ? $search : '' }}"
					placeholder="Search movies by title, genre or synopsis...">
				<button type="submit" class="btn btn-secondary"><i class="fa-solid fa-magnifying-glass"></i></button>
			</div>
		</form>
		{{-- Filter by genre --}}
		<div class="dropdown mb-4">
			<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownGenre" data-bs-toggle="dropdown"
				aria-expanded="false">
				Filter by Genre
			</button>
			<ul class="dropdown-menu" aria-labelledby="dropdownGenre" style="max-height: 200px; overflow-y: auto">
				<li><a class="dropdown-item" href="{{ route('all.movies') }}">All Genres</a></li>
				<li><a class="dropdown-item" href="{{ route('filter.movies', ['genre' => 'Action']) }}">Action</a></li>
				<li><a class="dropdown-item" href="{{ route('filter.movies', ['genre' => 'Drama']) }}">Drama</a></li>
				<li><a class="dropdown-item" href="{{ route('filter.movies', ['genre' => 'Comedy']) }}">Comedy</a></li>
				<li><a class="dropdown-item" href="{{ route('filter.movies', ['genre' => 'Horror']) }}">Horror</a></li>
				<li><a class="dropdown-item" href="{{ route('filter.movies', ['genre' => 'Thriller']) }}">Thriller</a></li>
				<li><a class="dropdown-item" href="{{ route('filter.movies', ['genre' => 'Sci-Fi']) }}">Sci-Fi</a></li>
				<li><a class="dropdown-item" href="{{ route('filter.movies', ['genre' => 'Romance']) }}">Romance</a></li>
				<li><a class="dropdown-item" href="{{ route('filter.movies', ['genre' => 'Superhero']) }}">Superhero</a></li>
				<li><a class="dropdown-item" href="{{ route('filter.movies', ['genre' => 'Adventure']) }}">Adventure</a></li>
				<li><a class="dropdown-item" href="{{ route('filter.movies', ['genre' => 'Mystery']) }}">Mystery</a></li>
				<!-- Add more genres here -->
			</ul>
		</div>

		{{-- All Movies --}}
		@if (empty($selected_genre) && empty($search))
			<div class="mb-3">
				<h3 class="my-4">Showing all movies</h3>
			</div>
		@endif

		{{-- Selected Genre --}}
		@if (!empty($selected_genre))
			<div class="mb-3">
				<h5>Showing movies by Genre: {{ $selected_genre }}</h5>
			</div>
		@endif

		{{-- Search On --}}
		@if (!empty($search))
			<div class="mb-3">
				<h5>Showing movies by search: {{ $search }}</h5>
			</div>
		@endif

		@if($movies->isEmpty())
			@if(isset($search))
				<p>Nothing matches with "{{ $search }}"</p>
			@elseif(isset($selected_genre))
				<p>Nothing matches with "{{ $selected_genre }}"</p>
			@endif
		@endif

		{{-- Card movies --}}
		<div class="row row-cols-md-3 row-cols-lg-5 row-cols-sm-2 row-cols-2 g-4">
			@foreach ($movies as $movie)
				<div class="col mb-3" onclick="window.location.href='{{ route('detail.movies', ['id' => $movie->id]) }}'"
					style="cursor: pointer;">
					<div class="col mb-3">
						<div class="card h-80">
							<img src="{{ $movie->poster }}" class="card-img-top" alt="Poster Movie" style="">
							<div class="card-body">
								<h6 class="card-title">{{ $movie->title }}</h6>
								<span class="badge text-bg-warning my-2">{{ $movie->genre }}</span>
								<span class="badge text-bg-info my-2">{{ $movie->year }}</span>
								<span class="d-inline-block"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffc300"
										class="bi bi-star-fill" viewBox="0 0 16 16">
										<path
											d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
									</svg></span> <span class="d-inline-block align-middle">{{ $movie->rating }}/10</span>
								<span class="d-inline-block text-truncate" style="max-width: 170px;">
									{{ $movie->synopsis }}
								</span>
							</div>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>

	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
		<path fill="#E49B0F" fill-opacity="1"
			d="M0,256L48,229.3C96,203,192,149,288,128C384,107,480,117,576,138.7C672,160,768,192,864,192C960,192,1056,160,1152,154.7C1248,149,1344,171,1392,181.3L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
		</path>
	</svg>
@endsection
