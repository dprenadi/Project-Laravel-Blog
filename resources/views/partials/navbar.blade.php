
{{-- TAMPILAN NAVBAR --}}
<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
  <div class="container">
    <a class="navbar-brand" href="/">Blog</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('posts*') ? 'active' : '' }}" href="/posts">Posts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('categories*') ? 'active' : '' }}" href="/categories">Category</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('forums') ? 'active' : '' }}" href="/forums">Forum</a>
        </li>
      </ul>
      {{-- END TAMPILAN NAVBAR --}}

      {{-- TAMPILAN AUTH USER LOGIN --}}
      <ul class="navbar-nav ms-auto">
      @auth
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Hai, {{ auth()->user()->name }}
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/about"><i class="bi bi-file-person"></i> My Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-window-reverse"></i> My Dashboard</a></li>
            <li><hr class="dropdown-divider"></li>

            {{-- FORM USER LOGOUT --}}
            <li>
              <form action="/logout" method="post">
                @csrf
                <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
              </form>
            </li>
            {{-- END FORM USER LOGOUT --}}

          </ul>
      </li>
      {{-- END TAMPILAN AUTH USER LOGIN --}}

      {{-- TAMPILAN AUTH USER GUEST --}}
      @else
        <li class="nav-item">
          <a href="/login" class="nav-link {{ Request::is('login') ? 'active' : '' }}"><i class="bi bi-box-arrow-in-right"></i> Login</a>
        </li>
      @endauth
      </ul>
      {{-- END TAMPILAN AUTH USER GUEST --}}
      
    </div>
  </div>
</nav>