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

		<div id="title-movies" style="position-relative" class="featured-movies mt-5 mb-2">
			<h1 class="fs-3 fw-bolder pb-3 text-center text-white">All Movies</h1>
		</div>

		{{-- Search bar --}}
		<form action="{{ route('search.movies') }}" method="GET" class="mb-5">
			<div class="input-group">
				<input type="text" name="search" class="form-control" value="{{ $search ?? '' }}" placeholder="Search movies by title, genre or synopsis...">
				<button type="submit" class="btn btn-secondary"><i class="fa-solid fa-magnifying-glass"></i></button>
			</div>
		</form>
		{{-- Card movies --}}
		<div class="row row-cols-md-3 row-cols-lg-5 row-cols-sm-2 row-cols-2 g-4">
			@foreach ($movies as $movie)
				<div class="col mb-3" onclick="window.location.href='{{ route('detail.movies', ['id' => $movie->id]) }}'" style="cursor: pointer;">
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
