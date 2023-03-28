@extends('layouts.main')

@section('content')
	<div class="mx-0">
		<div class="display p-5 text-end text-white" style="background-color: #E49B0F;">
			<h1><span class="d-inline-block ms-3 mt-5 align-middle">YukReview</span></h1>
			<p class="mb-5">Discover and review local Indonesian cinema with
				<span class="fw-bold">Yuk</span>
				<span class="fw-bold">Review.</span>
			</p>
		</div>
		<div class="arrow-container">
			<a href="#about" draggable="false">
				<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="white"
					class="bi bi-arrow-down-circle-fill position-absolute top-90 start-50" viewBox="0 0 16 16">
					<path
						d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z" />
				</svg>
			</a>
		</div>
	</div>
	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
		<path fill="#E49B0F" fill-opacity="1"
			d="M0,288L40,288C80,288,160,288,240,282.7C320,277,400,267,480,266.7C560,267,640,277,720,261.3C800,245,880,203,960,160C1040,117,1120,75,1200,74.7C1280,75,1360,117,1400,138.7L1440,160L1440,0L1400,0C1360,0,1280,0,1200,0C1120,0,1040,0,960,0C880,0,800,0,720,0C640,0,560,0,480,0C400,0,320,0,240,0C160,0,80,0,40,0L0,0Z">
		</path>
	</svg>

	{{-- About --}}
	<div class="about container my-5" id="about">
		<h1 class="fs-3 fw-bolder mb-3">About</h1>
		<div class="row">
			<div class="col-xl-6 about">

				{{-- <span class="fw-bold d-inline">Yuk</span> --}}
				{{-- <span class="fw-bold d-inline">Review</span> --}}
				<p> <strong>Yuk Review</strong> is a website that provides information and reviews about local movies in Indonesia.
					Our website is
					designed to help users discover new movies and television programs, as well as learn more about the cast and crew
					behind them. With data sourced from IMDB, our platform is the perfect destination for movie enthusiasts looking to
					explore and share their love of Indonesian cinema.</p>
				<p>Whether you're a casual movie-goer or a passionate cinephile, YukReview is the go-to platform for discovering and
					reviewing local films.</p>
			</div>
			<div class="col-xl-6">
				<img src="/asset/about.svg" alt="about us" class="float-end" draggable="false">
			</div>
		</div>
	</div>

	{{-- Movies --}}
	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
		<path fill="#E49B0F" fill-opacity="1"
			d="M0,224L80,186.7C160,149,320,75,480,64C640,53,800,107,960,128C1120,149,1280,139,1360,133.3L1440,128L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z">
		</path>
	</svg>

		<div style="background-color: #E49B0F;">
			<h1 class="fs-3 fw-bolder pb-3 text-center text-white">Movies</h1>
			{{-- Card 1 --}}
			<div class="row justify-content-center">
				<div class="movies col-6 col-md-3 my-3">
					<a href="#" class="card">
						<img src="{{ asset('asset/gundala.jpg') }}" class="card-img-top img-thumbnail" alt="img-cover-film">
						<div class="card-body">
							<h5 class="card-title m-0">Gundala</h5>
							<span class="badge text-bg-warning my-2">Action, Adventure, Drama</span>
							<span class="d-inline-block text-truncate" style="max-width: 200px;">
								Indonesia's preeminent comic book superhero and his alter ego Sancaka enter the cinematic universe to battle the
								wicked Pengkor and his diabolical squad of orphan assassins.
							</span>
						</div>
					</a>
				</div>

				{{-- Card 2 --}}
				<div class="col-6 col-md-3 my-3">
					<a href="#" class="card">
						<img src="{{ asset('asset/habibie.jpg') }}" class="card-img-top img-thumbnail" alt="img-cover-film">
						<div class="card-body">
							<h5 class="card-title m-0">Habibie & Ainun</h5>
							<span class="badge text-bg-warning my-2">Biography, Drama, Romance</span>
							<span class="d-inline-block text-truncate" style="max-width: 200px;">
								This movie is based on the memoir written by the 3rd President of Indonesia and one of the world-famous engineer,
								B.J. Habibie about his wife, Hasri Ainun Habibie.
							</span>
						</div>
					</a>
				</div>

				{{-- Card 3 --}}
				<div class="col-6 col-md-3 my-3">
					<a href="#" class="card">
						<img src="{{ asset('asset/theraid2.jpg') }}" class="card-img-top img-thumbnail" alt="img-cover-film">
						<div class="card-body">
							<h5 class="card-title m-0">The Raid 2</h5>
							<span class="badge text-bg-warning my-2">Action, Crime, Thriller</span>
							<span class="d-inline-block text-truncate" style="max-width: 200px;">
								Only a short time after the first raid, Rama goes undercover with the thugs of Jakarta and plans to bring down
								the syndicate and uncover the corruption within his police force.
							</span>
						</div>
					</a>
				</div>
				{{-- Pagination example --}}
				<nav aria-label="Page navigation example">
					<ul class="pagination justify-content-center container">
						<li class="page-item">
							<a class="page-link" href="#" aria-label="Next">
								<span aria-hidden="true"><i class="bi bi-caret-left"></i></span>
							</a>
						</li>
						<li class="page-item active"><a class="page-link" href="#">1</a></li>
						<li class="page-item"><a class="page-link" href="#">2</a></li>
						<li class="page-item"><a class="page-link" href="#">3</a></li>
						<li class="page-item">
							<a class="page-link" href="#" aria-label="Next">
								<span aria-hidden="true"><i class="bi bi-caret-right"></i></span>
							</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
@endsection
