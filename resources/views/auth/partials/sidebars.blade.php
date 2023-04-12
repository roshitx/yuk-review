    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            {{-- Kalau ada request url nya tampilin class active, kalau gaada kosongin. --}}
            <a class="nav-link {{ Request::is('admin') ? 'active' : '' }} d-inline-block" href="{{ route('admin') }}">
              <span data-feather="edit" class="align-text-bottom"></span>
              <span class="d-inline-block align-middle">Edit Profile Information</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('changepw*') ? 'active' : '' }} d-inline-block" href="{{ route('password.edit') }}">
              <span data-feather="lock" class="align-text-bottom"></span>
              <span class="d-inline-block align-middle">Change Password</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/movies*') ? 'active' : '' }} d-inline-block" href="{{ route('manage.movies') }}">
              <span data-feather="film" class="align-text-bottom"></span>
              <span class="d-inline-block align-middle">Movies</span>
            </a>
          </li>
        <hr>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('/post*') ? 'active' : '' }} d-inline-block" href="/">
                <span data-feather="arrow-left" class="align-text-bottom"></span>
                <span class="d-inline-block align-middle">Back to home</span>
            </a>
          </li>
        </ul>

      </div>
    </nav>