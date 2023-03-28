@extends('layouts.main')

@section('content')
	<div class="container mt-5">
		<h1 class="mb-4">Profile Admin</h1>
		<div class="row">
			<div class="col-md-4">
				<div class="card mb-3">
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
						{{  session('success') }}
					</div>
				@endif
			</div>
			<div class="col-md-8">
				<form action="{{ route('admin.update') }}" method="POST">
					@csrf
					@method('PUT')
					<div class="mb-3">
						<label for="name" class="form-label">Name</label>
						<input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
					</div>
					<div class="mb-3">
						<label for="email" class="form-label">Email</label>
						<input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
					</div>
					<div class="mb-3">
						<label for="password" class="form-label">Password</label>
						<input type="password" class="form-control" id="password" name="password">
                        <small>Don't fill it if you do not want to change</small>
					</div>
					<div class="mb-3">
						<label for="birth" class="form-label">Birthdate</label>
						<input type="date" class="form-control" id="birth" name="birth" value="{{ $user->birth }}">
					</div>
					<button type="submit" class="btn btn-outline-primary">Save</button>
				</form>
			</div>
		</div>
	</div>

	<div class="wave position-relative">
		<svg class="position-absolute z-n1 bottom-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
			<path fill="#E49B0F" fill-opacity="1"
				d="M0,64L80,85.3C160,107,320,149,480,144C640,139,800,85,960,69.3C1120,53,1280,75,1360,85.3L1440,96L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z">
			</path>
		</svg>
	</div>
    @if (Session::has('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: "{{ Session::get('success') }}",
    })
</script>
@endif
@endsection