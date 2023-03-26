@extends('auth.main')

@section('container')
	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="position-absolute z-n1 top-0">
		<path fill="#E49B0F" fill-opacity="1"
			d="M0,320L48,298.7C96,277,192,235,288,218.7C384,203,480,213,576,192C672,171,768,117,864,106.7C960,96,1056,128,1152,154.7C1248,181,1344,203,1392,213.3L1440,224L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z">
		</path>
	</svg>
	<div class="container-fluid">
		<a class="btn btn-warning btn-sm position-absolute mt-3" href="/" role="button"><i class="bi bi-arrow-left"></i>
			Back</a>
	</div>
	<section class="vh-100 z-2">
		<div class="h-custom container">
			<div class="row d-flex justify-content-center align-items-center h-100">
				<div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
					<h2 class="fw-bolder mb-4 text-white">Register</h2>
					<form action="/register" method="POST">
						@csrf

						<div class="row email-name">
							<div class="col">
								{{-- Input Email --}}
								<div class="form-floating mb-3">
									<input type="email"
										class="form-control @error('email')
                                        is-invalid
                                        @enderror"
										name="email" id="email" placeholder="Please fill valid email" required autofocus
										value="{{ old('email') }}" autocomplete="email">
									<label for="email">Email address</label>
									@error('email')
										<div class="invalid-feedback">
											<strong>{{ $message }}</strong>
										</div>
									@enderror
								</div>
							</div>
							<div class="col">
								{{-- Input Name --}}
								<div class="form-floating">
									<input type="text"
										class="form-control @error('name')
                                        is-invalid
                                        @enderror"
										name="name" id="name" placeholder="Name" required value="{{ old('name') }}" autocomplete="name">
									<label for="name">Name</label>
									@error('name')
										<div class="invalid-feedback">
											<strong>{{ $message }}</strong>
										</div>
									@enderror
								</div>
							</div>
						</div>
						{{-- Password --}}
						<div class="form-floating mb-3">
							<input type="password"
								class="form-control @error('password')
                                        is-invalid
                                        @enderror"
								name="password" id="password" placeholder="Password" required autocomplete="new-password">
							<label for="password">Password</label>
						</div>
						{{-- Akhir Password --}}

						{{-- Confirm Password --}}
						<div class="form-floating mb-3">
							<input type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation"
								id="password" placeholder="Confirm Password" required autocomplete="new-password">
							<label for="password">Confirm Password</label>
							@error('password')
								<div class="invalid-feedback">
									<strong>{{ $message }}</strong>
								</div>
							@enderror
						</div>
						{{-- Akhir Confirm Password --}}

						{{-- Gender --}}
						<div class="mb-3">
							<label for="" class="form-label">Gender</label>
							<div class="">
								<select class="form-select" name="gender" id="">
									<option value="other" selected>Other</option>
									<option value="male">Male</option>
									<option value="female">Female</option>
								</select>
							</div>
						</div>
						{{-- Akhir Gender --}}
						<div class="text-lg-start mt-4 pt-2 text-center">
							<button type="submit" class="d-block btn btn-warning"
								style="padding-left: 2.5rem; padding-right: 2.5rem;">Register</button>
							<p class="small mt-2 mb-0 pt-1">Already have account?
								<a href="/login" class="link-warning">Login</a>
							</p>
						</div>
					</form>
				</div>
				<div class="col-md-9 col-lg-6 col-xl-5 mb-3">
					<img src="{{ asset('asset/register.svg') }}" class="img-fluid" alt="Sample image">
				</div>
			</div>
		</div>
	</section>
@endsection
