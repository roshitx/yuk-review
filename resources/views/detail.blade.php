@extends('layouts.main')

@section('content')
	<div class="detail p-5" style="background-color: #E49B0F;">
		<div class="container">
			<div class="card col-12">
				<div class="card-body px-5">
					<div class="row">
						<div class="col-lg-4 col-md-12 mb-md-3">
							<img src="{{ $movie->poster }}" style="max-width: 60%; object-fit: fill;" alt="Poster {{ $movie->title }}"
								class="d-block mx-auto my-2 rounded border border-2" draggable="false">
						</div>
						<div class="col-lg-8 col-md-12 d-flex flex-column justify-content-center">
							<div class="mb-1">
								<h1 class="fw-bold mt-3">{{ $movie->title }}</h1>
							</div>
							<div class="mb-1">
								<span class="badge text-bg-warning my-2">{{ $movie->genre }}</span>
							</div>
							<div class="mb-1">
								<span><i class="bi bi-calendar-fill"></i> {{ $movie->year }}</span>
							</div>
							<div class="mb-1">
								<span><i class="bi bi-clock-fill"></i> {{ $movie->duration }}</span>
							</div>
							<div class="mb-1">
								<span><i class="bi bi-star-fill"></i> {{ $movie->rating }}/10</span>
							</div>
							<div class="mb-1">
								<span><i class="bi bi-person-check-fill"></i> {{ number_format($movie->rating_count) }} person</span>
							</div>
							<div class="mt-3">
								<span class="fs-5 fw-bold"><i class="bi bi-file-text"></i> Synopsis</span>
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
		<div class="bg-light border-1 rounded border p-5">
			<h2 class="fw-bold mb-3 text-center">Trailer</h2>
			<iframe width="100%" height="400" src="{{ $movie->trailer }}" title="{{ $movie->title }} Trailer" frameborder="0"
				allowfullscreen></iframe>
		</div>

		<div class="row">
			<div class="col-lg-6 mb-lg-0 mb-4 mt-5">
				<div class="card shadow-lg">
					<div class="card-header">
						<h4 class="card-title fw-bold m-0 text-center">Reviews for {{ $movie->title }}</h4>
					</div>
					<div class="card-body">
						<div class="overflow-auto" style="max-height: 400px;">
							@if (count($reviews) <= 0)
								<div class="fs-6 fw-semibold text-muted text-center">
									<p>There's no review about {{ $movie->title }} yet</p>
								</div>
							@endif
							@foreach ($reviews as $review)
								<div class="review d-flex flex-column flex-md-row align-items-center justify-content-between p-4">
									<div class="d-flex flex-column flex-md-row align-items-center">
										<div class="rating">
											@if ($review->rating >= 8)
												<span class="badge bg-success rounded-pill"><i class="bi bi-hand-thumbs-up-fill me-1"></i>Excellent!</span>
											@elseif ($review->rating >= 6 && $review->rating <= 7)
												<span class="badge bg-primary rounded-pill"><i class="bi bi-hand-thumbs-up-fill me-1"></i>Good</span>
											@elseif ($review->rating == 5)
												<span class="badge bg-warning rounded-pill"><i class="bi bi-hand-thumbs-up-fill me-1"></i>OK</span>
											@elseif ($review->rating < 5)
												<span class="badge bg-danger rounded-pill"><i class="bi bi-hand-thumbs-down-fill me-1"></i>Bad</span>
											@endif
											<p class="text-body-secondary mb-0">{{ $review->email }}</p>
											<div class="d-flex align-items-center">
												@for ($i = 1; $i <= $review->rating; $i++)
													<i class="bi bi-star-fill text-warning"></i>
												@endfor
												@for ($i = $review->rating + 1; $i <= 10; $i++)
													<i class="bi bi-star text-warning"></i>
												@endfor
											</div>
										</div>
									</div>
									<div class="review-content mt-md-0 mt-4">
										<figure class="text-end">
											<blockquote class="blockquote mt-3">
												<p class="card-text fs-6 fst-italic mb-0"> {{ $review->review }} </p>
											</blockquote>
											<figcaption class="blockquote-footer">
												<cite title="Source Title">{{ $review->name }}</cite>
												<br>
												<small>{{ $review->created_at }}</small>
											</figcaption>
										</figure>
									</div>
								</div>
								<hr>
							@endforeach
						</div>
					</div>
				</div>
			</div>

			{{-- Form Reviews --}}
			<div class="col-lg-6 mt-lg-5">
				<div class="card shadow-lg">
					<div class="card-header">
						<h4 class="card-title fw-bold m-0 text-center">Form for review</h4>
					</div>
					<div class="card-body">
						<form action="{{ route('review.store', $movie->id) }}" method="POST" id="review-form">
							@csrf
							<div class="form-group mb-3">
								<label for="rating" class="form-label">Rating: <span class="text-danger">*</span></label>
								<select class="form-select @error('rating') is-invalid @enderror" id="rating" aria-describedby="ratingHelp"
									name="rating">
									<option value="">-- Select rating --</option>
									@for ($i = 1; $i <= 10; $i++)
										<option value="{{ $i }}">★ {{ $i }}
										</option>
									@endfor
								</select>
								@error('rating')
									<div class="invalid-feedback" role="alert">
										{{ $message }}
									</div>
								@enderror
								<div id="ratingHelp" class="form-text">Choose between 1 to 10.</div>
							</div>
							<div class="form-group mb-3">
								<label for="review" class="form-label">Review: <span class="text-danger">*</span></label>
								<textarea class="form-control @error('review') is-invalid @enderror" id="review" rows="3" name="review"
								 placeholder="Write your review"></textarea>
								@error('review')
									<div class="invalid-feedback" role="alert">
										{{ $message }}
									</div>
								@enderror
							</div>
							<div class="form-group mb-3">
								<label for="captcha" class="form-label">Captcha: <span class="text-danger">*</span></label>
								<div class="captcha">
									<span id="captcha_img">{!! captcha_img('flat') !!}</span>
									<button type="button" onclick="reloadCaptcha()" class="btn btn-danger reload" id="reload">
										&#x21bb;
									</button>
									<script>
										function reloadCaptcha(params) {
											var url = "{{ route('reload.captcha') }}"
											fetch(url, {
													method: "GET",
												})
												.then(response => response.json())
												.then((response) => {
													let data = response.captcha;
													let span = document.getElementById('captcha_img');
													span.innerHTML = data;
												})
										}
									</script>
								</div>
								<div class="col-md-4 mt-2">
									<input type="text" id="captcha" class="form-control @error('captcha') is-invalid @enderror"
										placeholder="Enter Captcha" name="captcha">
									@error('captcha')
										<div class="invalid-feedback" role="alert">
											{{ $message }}
										</div>
									@enderror
								</div>
							</div>

							<button type="submit" class="btn btn-warning w-100">Submit</button>
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

	@if (session('success'))
		<script>
			Swal.fire({
				icon: 'success',
				title: 'Success',
				text: '{{ session('success') }}',
			});
		</script>
	@elseif (session('error'))
		<script>
			Swal.fire({
				icon: 'error',
				title: 'Fail',
				text: '{{ session('error') }}',
			});
		</script>
	@endif
@endsection
