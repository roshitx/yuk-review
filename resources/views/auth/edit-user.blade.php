@extends('auth.layouts.main')
@section('content')
	<div class="col-lg-12 mb-5 mt-5">
		@if (session('success'))
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
		@if (session('error'))
			<div class="alert alert-success" role="alert">
				{{ session('error') }}
			</div>
			<script>
				Swal.fire({
					icon: 'error',
					title: 'Failed',
					text: '{{ session('error') }}',
				});
			</script>
		@endif
		<div class="card mb-3 shadow-lg">
			<div class="card-header text-bg-warning">
				<h5 class="card-title mb-0">Edit User {{ $user->id }}</h5>
			</div>
			<div class="card-body">
				<form action="{{ route('user.update') }}" method="POST">
					@csrf
					<input type="hidden" name="id" value="{{ $user->id }}">
					<div class="mb-3">
						<label for="name">Name</label>
						<input type="text" value="{{ $user->name }}" id="name" name="name" class="form-control">
					</div>
					<div class="mb-3">
						<label for="gender">Gender</label>
						<select name="gender" id="gender" class="form-select">
							<option value="Male" {{ $user->gender == 'Male' ? 'selected' : '' }}>Male</option>
							<option value="Female" {{ $user->gender == 'Female' ? 'selected' : '' }}>Female</option>
							<option value="Other" {{ $user->gender == 'Other' ? 'selected' : '' }}>Other</option>
						</select>
					</div>
					<div class="mb-3">
						<label for="birth">Date of Birth</label>
						<input type="date" value="{{ $user->birth }}" id="birth" name="birth" class="form-control">
					</div>
					<div class="mb-3">
						<label for="role">Role</label>
						<select name="role" id="role" class="form-select">
							<option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
							<option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
						</select>
					</div>
					<div class="d-flex justify-content-between mb-3">
						<a href="{{ route('user.index') }}" class="btn btn-danger"><i class="fa-solid fa-arrow-left"></i> Back</a>
						<button type="submit" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i> Edit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection
