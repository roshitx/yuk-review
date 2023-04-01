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
		{{-- Search bar --}}
		<div class="input-group mb-3 mt-3">
			<input type="search" class="form-control rounded" placeholder="Search..." aria-label="Search"
				aria-describedby="search-addon" />
			<button type="button" id="search" class="btn btn-light">
				<i class="bi bi-search"></i>
			</button>
		</div>

		<div id="title-movies" style="position-relative" class="featured-movies mt-5 mb-2">
			<h1 class="fs-3 fw-bolder pb-3 text-center text-white">Featured Movies</h1>
		</div>

		{{-- Card movies --}}
		<div class="row row-cols-md-3 row-cols-lg-5 row-cols-sm-2 row-cols-2 g-4">
			<a href="#">
				<div class="col mb-3">
					<div class="card h-80">
						<img src="{{ asset('asset/gundala.jpg') }}" class="card-img-top" alt="..." style="">
						<div class="card-body">
							<h6 class="card-title">Gundala</h6>
							<span class="badge text-bg-warning my-2">Action, Adventure, Drama</span>
							<span class="badge text-bg-info my-2">2019</span>
							<span class="d-inline-block"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffc300"
									class="bi bi-star-fill" viewBox="0 0 16 16">
									<path
										d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
								</svg></span> <span class="d-inline-block align-middle">6,1/10</span>
							<span class="d-inline-block text-truncate" style="max-width: 170px;">
								Indonesia's preeminent comic book superhero and his alter ego Sancaka enter the cinematic universe to battle the
								wicked Pengkor and his diabolical squad of orphan assassins.
							</span>
						</div>
					</div>
				</div>
			</a>

			{{-- Card 2 --}}
			<a href="#">
				<div class="col mb-3">
					<div class="card h-80">
						<img src="{{ asset('asset/habibie.jpg') }}" class="card-img-top" alt="..." style="">
						<div class="card-body">
							<h6 class="card-title">Habibie & Ainun</h6>
							<span class="badge text-bg-warning my-2">Biography, Drama, Romance</span>
							<span class="badge text-bg-info my-2">2012</span>
							<span class="d-inline-block"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffc300"
									class="bi bi-star-fill" viewBox="0 0 16 16">
									<path
										d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
								</svg></span> <span class="d-inline-block align-middle">7,6/10</span>
							<span class="d-inline-block text-truncate" style="max-width: 170px;">
								This movie is based on the memoir written by the 3rd President of Indonesia and one of the world-famous engineer, B.J. Habibie about his wife, Hasri Ainun Habibie.
							</span>
						</div>
					</div>
				</div>
			</a>

			{{-- Card 3 --}}
			<a href="{{ route('detail-movies') }}">
				<div class="col mb-3">
					<div class="card h-80">
						<img src="{{ asset('asset/theraid2.jpg') }}" class="card-img-top" alt="..." style="">
						<div class="card-body">
							<h6 class="card-title">The Raid 2</h6>
							<span class="badge text-bg-warning my-2">Action, Crime, Thriller</span>
							<span class="badge text-bg-info my-2">2014</span>
							<span class="d-inline-block"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffc300"
									class="bi bi-star-fill" viewBox="0 0 16 16">
									<path
										d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
								</svg></span> <span class="d-inline-block align-middle">7,9/10</span>
							<span class="d-inline-block text-truncate" style="max-width: 170px;">
								Only a short time after the first raid, Rama goes undercover with the thugs of Jakarta and plans to bring down the syndicate and uncover the corruption within his police force.
							</span>
						</div>
					</div>
				</div>
			</a>

			{{-- Card 4 --}}
			<a href="#">
				<div class="col mb-3">
					<div class="card h-80">
						<img src="{{ asset('asset/pengabdi.jpeg') }}" class="card-img-top" alt="..." style="">
						<div class="card-body">
							<h6 class="card-title">Pengabdi Setan</h6>
							<span class="badge text-bg-warning my-2">Drama, Horror, Mystery</span>
							<span class="badge text-bg-info my-2">2017</span>
							<span class="d-inline-block"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffc300"
									class="bi bi-star-fill" viewBox="0 0 16 16">
									<path
										d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
								</svg></span> <span class="d-inline-block align-middle">6,5/10</span>
							<span class="d-inline-block text-truncate" style="max-width: 170px;">
								After dying from a strange illness that she suffered for 3 years, a mother returns home to pick up her children.
							</span>
						</div>
					</div>
				</div>
			</a>

			{{-- Card 5 --}}
			<a href="#">
				<div class="col mb-3">
					<div class="card h-80">
						<img src="{{ asset('asset/tokosebela.jpg') }}" class="card-img-top" alt="..." style="">
						<div class="card-body">
							<h6 class="card-title">Cek Toko Sebelah</h6>
							<span class="badge text-bg-warning my-2">Comedy, Drama</span>
							<span class="badge text-bg-info my-2">2016</span>
							<span class="d-inline-block"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffc300"
									class="bi bi-star-fill" viewBox="0 0 16 16">
									<path
										d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
								</svg></span> <span class="d-inline-block align-middle">7,8/10</span>
							<span class="d-inline-block text-truncate" style="max-width: 170px;">
								Just when everything is going well for Erwin, his father falls sick and asks him to drop everything and help out at the family store, disappointing his irresponsible older brother Yohan.
							</span>
						</div>
					</div>
				</div>
			</a>
		</div>
	</div>

	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#E49B0F" fill-opacity="1" d="M0,256L48,229.3C96,203,192,149,288,128C384,107,480,117,576,138.7C672,160,768,192,864,192C960,192,1056,160,1152,154.7C1248,149,1344,171,1392,181.3L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
@endsection
