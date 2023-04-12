<nav class="navbar navbar-light navbar-expand-md navbar-dark justify-content-center">
	<div class="container">
		<a href="/" class="navbar-brand d-flex w-50 me-auto">YukReview</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsingNavbar3">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="navbar-collapse w-100 collapse" id="collapsingNavbar3">
			<ul class="navbar-nav w-100 justify-content-center">
				<li class="nav-item">
					<a class="nav-link {{ $active === '/' ? 'active' : '' }}" href="/">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link {{ $active === 'movies' ? 'active' : '' }}" href="/movies">Movies</a>
				</li>
			</ul>

			<ul class="nav navbar-nav ms-auto w-100 justify-content-end">
				@auth
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							{{ auth()->user()->name }}
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							<li><a class="dropdown-item" href="{{ route('admin') }}" target="_blank"><i class="bi bi-person-circle"></i> Profile</a></li>
							<li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{  route('logout') }}" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-in-left"></i> Logout</button>
                                </form>
                            </li>
						</ul>
					</li>
				@else
					<li class="nav-item">
						<a class="nav-link" href="{{  route('login') }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
								fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
								<path fill-rule="evenodd"
									d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z" />
								<path fill-rule="evenodd"
									d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
							</svg> Login</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ route('register') }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
								fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
								<path
									d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />
							</svg> Register</a>
					</li>
				@endauth
			</ul>
		</div>
	</div>
</nav>
