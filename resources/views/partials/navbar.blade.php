<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand" href="/">UPT</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="#">Daftar</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Welcome Back,{{ auth()->user()->name }}
            </a>
            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarDarkDropdownMenuLink">
              <li><a class="dropdown-item" href="/dashboard">My Dashboard</a></li>
              <li><hr class="dropdown-divider"></li>
              <form action="/logout" method="post">
                @csrf
                <button class="btn" type="submit" name="">Logout</button>
              </form>
            </ul>
          </li>
          @else
          <li class="nav-item">
            <a href="/login" class="nav-link {{Request::is('login') ? 'active' : '' }}"><i class="bi bi-box-arrow-in-right"></i>Login</a>
          </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>