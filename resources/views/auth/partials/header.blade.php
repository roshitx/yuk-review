<header class="navbar navbar-dark bg-primary sticky-top flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="{{ route('home') }}">YukReview Dashboard</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="submit" class="nav-link bg-primary px-3 border-0 d-inline-block"><span data-feather="log-out"></span><span class="d-inline-block align-middle ms-1"> Logout</span></button>
        </form>
      </div>
    </div>
  </header>