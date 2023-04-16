@extends('auth.layouts.main')
@section('content')
	<div class="col-lg-12 mb-5 mt-5">
		<h1 class="mb-4">Manage Users</h1>
		@if (session('success'))
			<div class="alert alert-success" role="alert">
				<i class="bi bi-check-circle-fill"></i> {{ session('success') }}
			</div>
			<script>
				Swal.fire({
					icon: 'success',
					title: 'Success',
					text: '{{ session('success') }}',
				});
			</script>
		@elseif (session('error'))
			<div class="alert alert-danger" role="alert">
				<i class="bi bi-x-circle-fill"></i> {{ session('error') }}
			</div>
			<script>
				Swal.fire({
					icon: 'error',
					title: 'Fail',
					text: '{{ session('error') }}',
				});
			</script>
		@endif
		<div class="row">
			<div class="col-md-12">
				<div class="card mb-3 shadow-lg">
					<div class="card-header text-bg-secondary">
						<h5 class="card-title mb-0">All Users</h5>
					</div>
					<div class="card-body">
						<!-- Button trigger modal -->
						<button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
							<i class="fa-solid fa-file-import"></i> Import
						</button>

						<a class="btn btn-success mb-3" href="{{ route('user.export') }}" target="_blank" role="button"><i
								class="fa-solid fa-file-export"></i> Export</a>
						<div class="table-responsive">
							<table class="table-striped table" id="usersTable">
								<thead>
									<tr>
										<th>No</th>
										<th>Name</th>
										<th>Email</th>
										<th>Gender</th>
										<th>Role</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($users as $user)
										<tr>
											<td class="lh-lg">{{ $loop->iteration }}</td>
											<td class="lh-lg">{{ $user->name }}</td>
											<td class="lh-lg">{{ $user->email }}</td>
											<td class="lh-lg">{{ $user->gender }}</td>
											<td class="lh-lg">{{ $user->role }}</td>
											<td>
												<a href="{{ route('user.edit', ['id' => $user->id]) }}"
													class="btn btn-sm btn-warning d-inline-block mr-2"><i class="fa-solid fa-pen-to-square"
														style="color: #fff;"></i></a>
												<form action="{{ route('user.delete', ['id' => $user->id]) }}" method="POST" class="d-inline-block">
													@csrf
													@method('DELETE')
													<input type="hidden" name="item_id" value="{{ $user->id }}">
													<button type="submit" class="delete-btn btn btn-sm btn-danger"><i class="fa-solid fa-trash"
															style="color: #fff;"></i></button>
												</form>
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<form action="{{ route('users.import') }}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="modal-header">
							<h1 class="modal-title fs-5" id="exampleModalLabel">Upload file</h1>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">

							<input type="file" name="file" class="form-control" required>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-primary"><i class="fa-solid fa-upload"></i> Upload</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script>
		// Sweetalert success delete
		const deleteButtons = document.querySelectorAll('.delete-btn');

		deleteButtons.forEach(function(button) {
			button.addEventListener('click', function(e) {
				e.preventDefault();

				const itemId = button.parentNode.querySelector('input[name="item_id"]').value;

				Swal.fire({
					title: 'Are you sure?',
					text: "You won't be able to revert this!",
					icon: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Yes, delete it!',
				}).then(function(result) {
					if (result.isConfirmed) {
						Swal.fire(
							'Deleted!',
							'User has been deleted.',
							'success'
						)
						button.parentNode.submit();
					}
				});
			});
		});


		$(document).ready(function() {
			$('#usersTable').DataTable();
		});
	</script>
@endsection
