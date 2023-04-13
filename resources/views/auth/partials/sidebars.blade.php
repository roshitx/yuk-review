				<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
					<div class="position-sticky sidebar-sticky pt-3">
						<ul class="nav flex-column">
							<li class="nav-item">
								{{-- Kalau ada request url nya tampilin class active, kalau gaada kosongin. --}}
								<a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }} d-inline-block" href="{{ route('admin') }}">
									<span data-feather="edit" class="align-text-bottom"></span>
									<span class="d-inline-block align-middle">Profile Information</span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link {{ Request::is('changepw*') ? 'active' : '' }} d-inline-block"
									href="{{ route('password.edit') }}">
									<span data-feather="lock" class="align-text-bottom"></span>
									<span class="d-inline-block align-middle">Change Password</span>
								</a>
							</li>

							<li class="nav-item">
								<a class="nav-link {{ Request::is('/post*') ? 'active' : '' }} d-inline-block" href="/">
									<span data-feather="arrow-left" class="align-text-bottom"></span>
									<span class="d-inline-block align-middle">Back to home</span>
								</a>
							</li>
						</ul>
            @auth
            @can('admin')
							<h6 class="sidebar-heading d-flex justify-content-between align-items-center text-muted mt-4 mb-1 px-3">
								<span>Administrator</span>
							</h6>
							<ul class="nav flex-column">
								<li class="nav-item">
									<a class="nav-link {{ Request::is('dashboard/movies*') ? 'active' : '' }} d-inline-block"
										href="{{ route('manage.movies') }}">
										<span data-feather="film" class="align-text-bottom"></span>
										<span class="d-inline-block align-middle">Movies</span>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link {{ Request::is('dashboard/users*') ? 'active' : '' }} d-inline-block"
										href="{{ route('user.index') }}">
										<span data-feather="users" class="align-text-bottom"></span>
										<span class="d-inline-block align-middle">Users</span>
									</a>
								</li>
							</ul>
            @endcan
            @endauth
					</div>
				</nav>
