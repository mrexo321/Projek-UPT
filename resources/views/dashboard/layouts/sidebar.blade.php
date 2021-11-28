<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
            <span data-feather="home"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/patients*') ? 'active' : '' }}" href="/dashboard/patients">
            <span data-feather="file-text"></span>
            Data Pasien
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/animals*') ? 'active' : '' }}" href="/dashboard/animals">
            <span data-feather="file-text"></span>
            Data Hewan
          </a>
        </li>
      </ul>
    </div>
</nav>