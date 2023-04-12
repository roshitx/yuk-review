@extends('layouts.main')

@section('content')
	<div class="detail p-5" style="background-color: #E49B0F;">
		<div class="container">
			<div class="card col-12">
				<div class="card-header" id="title-movies">
					<h1 class="card-title fw-bold m-0 px-5">{{ $movie->title }}</h1>
					<p class="card-text px-5">{{ $movie->year }} | {{ $movie->duration }}</p>
				</div>
				<div class="card-body px-5">
					<div class="row">
						<div class="col-lg-4 col-md-12 mb-md-3">
							<img src="{{ $movie->poster }}" alt="img-detail" class="img-thumbnail rounded" draggable="false">
						</div>
						<div class="col-lg-8 col-md-12 d-flex flex-column justify-content-center">
							<div class="mb-1">
								<span class="badge text-bg-warning my-2">{{ $movie->genre }}</span>
							</div>
							<div class="mb-1">
								<span><i class="bi bi-star-fill text-warning"></i> {{ $movie->rating }}/10</span>
							</div>
							<div class="mb-1">
								<span><i class="bi bi-person-check-fill"></i> {{ $movie->rating_count }}</span>
							</div>
							<div class="mt-3">
								<span class="fs-3 fw-bold"><i class="bi bi-file-text"></i> Synopsis</span>
								<p class="mt-1">{{ $movie->synopsis }}</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
		<path fill="#E49B0F" fill-opacity="1"
			d="M0,64L48,53.3C96,43,192,21,288,58.7C384,96,480,192,576,229.3C672,267,768,245,864,250.7C960,256,1056,288,1152,288C1248,288,1344,256,1392,240L1440,224L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z">
		</path>
	</svg>
	<div class="container">
		<div class="card col-12 px-5 shadow-lg">
			<div class="card-header" id="title-movies">
				<h1 class="card-title fw-bold mb-3">Trailer</h1>
			</div>
			<div class="card-body">
				<div class="col-md-12 col-6 shadow-lg d-flex justify-content-center">
					<iframe width="100%" height="400" src="{{ $movie->trailer }}" frameborder="0"
						allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
						allowfullscreen></iframe>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-6 mb-lg-0 mb-4 mt-5">
				<div class="card shadow-lg">
					<div class="card-header">
						<h2 class="card-title fw-bold m-0 text-center">Reviews</h2>
					</div>
					<div class="card-body">
						<div class="overflow-auto" style="max-height: 200px;">
							<div class="reviews d-flex p-5">
								<div class="avatar">
									<img src="{{ asset('asset/avatar/mrlego.jpg') }}" width="80" class="rounded-circle">
								</div>
								<div class="rate ms-5">
									<h5>Mr Lego</h5>
									<span>
										<i class="bi bi-star-fill text-warning"></i>
										<i class="bi bi-star-fill text-warning"></i>
										<i class="bi bi-star-fill text-warning"></i>
										<i class="bi bi-star-fill text-warning"></i>
										<i class="bi bi-star-fill text-warning"></i>
									</span>
									<p class="card-text">Great movie!</p>
								</div>
							</div>
							<hr>
							<div class="reviews d-flex p-5">
								<div class="avatar">
									<img src="{{ asset('asset/avatar/man1.jpg') }}" width="80" class="rounded-circle">
								</div>
								<div class="rate ms-5">
									<h5>John Doe</h5>
									<span>
										<i class="bi bi-star-fill text-warning"></i>
										<i class="bi bi-star-fill text-warning"></i>
										<i class="bi bi-star-fill text-warning"></i>
										<i class="bi bi-star-fill text-warning"></i>
									</span>
									<p class="card-text">Not bad, but could be better.</p>
								</div>
							</div>
							<hr>
							<div class="reviews d-flex p-5">
								<div class="avatar">
									<img src="{{ asset('asset/avatar/mrlego2.jpg') }}" width="80" class="rounded-circle">
								</div>
								<div class="rate ms-5">
									<h5>Jane Smith</h5>
									<span>
										<i class="bi bi-star-fill text-warning"></i>
										<i class="bi bi-star-fill text-warning"></i>
										<i class="bi bi-star-fill text-warning"></i>
										<i class="bi bi-star-fill text-warning"></i>
										<i class="bi bi-star-fill text-warning"></i>
									</span>
									<p class="card-text">Loved it!</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			{{-- Form Reviews --}}
			<div class="col-lg-6 mt-lg-5">
				<div class="card shadow-lg">
					<div class="card-header">
						<h2 class="card-title fw-bold m-0 text-center">Send your review..</h2>
					</div>
					<div class="card-body">
						<form>
							<div class="mb-3">
								<label for="email" class="form-label">Email</label>
								<input type="email" class="form-control" id="email" aria-describedby="emailHelp">
								<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
							</div>
							<div class="mb-3">
								<label for="rating" class="form-label">Rating</label>
								<select class="form-select" id="rating" aria-describedby="ratingHelp">
									<option value="">-- Select rating --</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
								</select>
								<div id="ratingHelp" class="form-text">Choose between 1 to 10.</div>
							</div>
							<div class="mb-3">
								<label for="review" class="form-label">Review</label>
								<textarea class="form-control" id="review" rows="3" aria-describedby="reviewHelp"></textarea>
								<div id="reviewHelp" class="form-text">Write your review.</div>
							</div>
							<button type="submit" class="btn bg-color w-100 text-white">Submit</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
		<path fill="#e49b0f" fill-opacity="1"
			d="M0,0L80,5.3C160,11,320,21,480,42.7C640,64,800,96,960,112C1120,128,1280,128,1360,128L1440,128L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z">
		</path>
	</svg>
@endsection
