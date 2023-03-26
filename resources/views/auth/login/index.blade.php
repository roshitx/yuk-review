@extends('auth.main')
@section('container')
	<div class="container-fluid">
		<a class="btn btn-warning btn-sm position-absolute mt-3" href="/" role="button"><i class="bi bi-arrow-left"></i>
			Back</a>
	</div>
	{{-- Flash message --}}

	<section class="vh-100 z-2">
		<div class="h-custom container">
			<div class="row d-flex justify-content-center align-items-center h-100">

				<div class="col-md-9 col-lg-6 col-xl-5 mb-3">
					<img src="{{ asset('asset/login.svg') }}" class="img-fluid" alt="Sample image">
				</div>
				<div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
					{{-- Flash message --}}
					@if (session()->has('success'))
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							{{ session('success') }}
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
					@endif

					@if (session()->has('loginError'))
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							{{ session('loginError') }}
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
					@endif

					<form action="/login" method="post">
						@csrf
						<h2 class="fw-bolder mb-4">Login</h2>
						{{-- Input Email --}}
						<div class="form-floating mb-3">
							<input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email"
								placeholder="Please fill valid email" value="{{ old('email') }}" autofocus required>
							<label for="email">Email address</label>
							@error('email')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
							@enderror
						</div>
						{{-- Input Password --}}
						<div class="form-floating">
							<input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
							<label for="password">Password</label>
						</div>
						<div class="text-lg-start mt-4 pt-2 text-center">
							<button type="submit" class="d-block btn btn-warning"
								style="padding-left: 2.5rem; padding-right: 2.5rem;;">Login</button>
							<p class="small mt-2 mb-0 pt-1">Don't have an account yet?
								<a href="/register" class="link-warning">Register</a>
							</p>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	<div class="svg">
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="position-absolute z-n1 bottom-0">
			<path fill="#E49B0F" fill-opacity="1"
				d="M0,288L24,272C48,256,96,224,144,192C192,160,240,128,288,112C336,96,384,96,432,101.3C480,107,528,117,576,122.7C624,128,672,128,720,106.7C768,85,816,43,864,48C912,53,960,107,1008,149.3C1056,192,1104,224,1152,234.7C1200,245,1248,235,1296,202.7C1344,171,1392,117,1416,90.7L1440,64L1440,320L1416,320C1392,320,1344,320,1296,320C1248,320,1200,320,1152,320C1104,320,1056,320,1008,320C960,320,912,320,864,320C816,320,768,320,720,320C672,320,624,320,576,320C528,320,480,320,432,320C384,320,336,320,288,320C240,320,192,320,144,320C96,320,48,320,24,320L0,320Z">
			</path>
		</svg>
	</div>
@endsection
