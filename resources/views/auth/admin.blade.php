@extends('auth.layouts.main')

@section('content')
	<div class="col-lg-10 mb-5 mt-5">
		<h1 class="mb-4">Profile Admin</h1>
		<div class="row">
			<div class="col-md-4">
				<div class="card text-bg-primary mb-3 shadow-lg">
					<div class="card-header">
						<h5 class="card-title">Halo {{ auth()->user()->role == 'admin' ? 'Admin' : 'User'  }}</h5>
						<strong>{{ auth()->user()->name }}!</strong>
					</div>
					<div class="card-body">
						<small class="card-text">{{ auth()->user()->email }}</small>
					</div>
				</div>
				@if (session()->has('success'))
					<div class="alert alert-success" role="alert">
						{{ session('success') }}
					</div>
					<script>
						Swal.fire({
							icon: 'success',
							title: 'Success',
							text: '{{ session('success') }}',
						});
					</script>
				@endif
				@if (session()->has('error')))
					<div class="alert alert-danger" role="alert">
						{{ session('error') }}
					</div>
					<script>
						Swal.fire({
							icon: 'error',
							title: 'Error',
							text: '{{ session('error') }}',
						});
					</script>
				@endif
			</div>
			<div class="col-md-8">
				<div class="card shadow-lg">
					<div class="card-header bg-warning">
						<h5 class="card-title fw-5 m-0">Edit Profile</h5>
					</div>
					<div class="card-body">
						<form action="{{ route('admin.update') }}" method="POST">
							@csrf
							@method('put')
							<div class="mb-3">
								<label for="name" class="form-label">Name <span class="text-danger">*</span></label>
								<input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
									value="{{ old('name', Auth::user()->name) }}" required>
								@error('name')
									<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
							<div class="mb-3">
								<label for="email" class="form-label">Email <span class="text-danger">*</span></label>
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
								<label for="gender" class="form-label">Gender <span class="text-danger">*</span></label>
								<select class="form-select" name="gender" id="gender">
									<option value="Male" {{ old('gender', Auth::user()->gender) == 'Male' ? 'selected' : '' }}>Male</option>
									<option value="Female" {{ old('gender', Auth::user()->gender) == 'Female' ? 'selected' : '' }}>Female</option>
									<option value="Other" {{ old('gender', Auth::user()->gender) == 'Other' ? 'selected' : '' }}>Other</option>
								</select>
							</div>

							<button type="submit" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i> Edit</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
