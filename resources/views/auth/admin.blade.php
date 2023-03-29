@extends('auth.layouts.main')

@section('content')
	<div class="col-lg-10 mb-5 mt-5">
		<h1 class="mb-4">Profile Admin</h1>
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
						<h5 class="card-title fw-5 m-0">Edit Profile</h5>
					</div>
					<div class="card-body">
						<form action="{{ route('admin.update') }}" method="POST">
							@csrf
							@method('put')
							<div class="mb-3">
								<label for="name" class="form-label">Name</label>
								<input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
									value="{{ old('name', Auth::user()->name) }}" required>
								@error('name')
									<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
							<div class="mb-3">
								<label for="email" class="form-label">Email</label>
								<input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
									value="{{ old('email', Auth::user()->email) }}" required>
								@error('email')
									<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
							<div class="mb-3">
								<label for="birth" class="form-label">Birthdate</label>
								<input type="date" class="form-control" id="birth" name="birth"
									value="{{ old('birth', Auth::user()->birth) }}">
							</div>
							<div class="mb-3">
								<label for="gender" class="form-label">Gender</label>
								<select class="form-select" name="gender" id="gender">
									<option selected value="{{ old('gender', Auth::user()->gender) }}">{{ $user->gender }}</option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
									<option value="Other">Other</option>
								</select>
							</div>
							<button type="submit" class="btn btn-primary">Edit</button>
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
