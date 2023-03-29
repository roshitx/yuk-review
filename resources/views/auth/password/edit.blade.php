@extends('auth.layouts.main')

@section('content')
	<div class="col-lg-10 mb-5 mt-5">
		<h1 class="mb-4">Password Manager</h1>
		<div class="row">
			<div class="col-md-4">
				<div class="card text-bg-primary mb-3 shadow-lg">
					<div class="card-header">
						<h5 class="card-title">Halo</h5>
						<strong>{{ auth()->user()->name }}!</strong>
					</div>
					<div class="card-body">
						<p class="card-text">{{ auth()->user()->email }}</p>
					</div>
				</div>
				@if (session()->has('success'))
					<div class="alert alert-success" role="alert">
						{{ session('success') }}
					</div>
				@endif
			</div>
			<div class="col-md-8">
				<div class="card shadow-lg">
					<div class="card-header">
						<h5 class="card-title m-0">
							Change Your Password
						</h5>
					</div>
					<div class="card-body">
						<form action="{{ route('password.update') }}" method="POST">
							@csrf
							@method('put')
							<div class="mb-3">
								<label for="current_password" class="form-label">Current Password</label>
								<input type="password" class="form-control @error('current_password') is-invalid @enderror" id="current_password" name="current_password">
								@error('current_password')
									<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
							<div class="mb-3">
								<label for="password" class="form-label">New Password</label>
								<input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
								@error('password')
									<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
							<div class="mb-3">
								<label for="password_confirmation" class="form-label">Password Confirmation</label>
								<input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation">
								@error('password_confirmation')
									<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
							<button type="submit" class="btn btn-primary">Save</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	{{-- @if (Session::get('success'))
		<script>
			Swal.fire({
				icon: 'success',
				title: 'Success!',
				text: "{{ Session::get('success') }}",
			})
		</script>
	@endif --}}
@endsection
