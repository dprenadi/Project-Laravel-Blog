{{-- <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : '' }}" href="/dashboard/posts">
              <span data-feather="file-text"></span>
              My Posts
            </a>
          </li>
        </ul>

        @can('admin')    
        <h6 class="sidebar-heading d-flex justify-content-between align-content-center px-3 mt-4 mb-1 text-muted">
          <span>Administrator</span>
        </h6>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}" href="/dashboard/categories">
              <span data-feather="grid"></span>
              Categories
            </a>
          </li>
        </ul>
        @endcan

      </div>
    </nav> --}}


    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-white sidebar collapse">
    <div class="position-fixed pt-3">
    <ul class="list-unstyled ps-0 nav flex-column">
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
          Home
        </button>
        <div class="collapse show" id="home-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li>
              <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="/">Home</a>
            </li>
            <li>
              <a class="nav-link {{ Request::is('posts*') ? 'active' : '' }}" href="/posts">Posts</a>
            </li>
            <li>
              <a class="nav-link {{ Request::is('categories*') ? 'active' : '' }}" href="/categories">Topics</a>
            </li>
          </ul>
        </div>
      </li>
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
          Dashboard
        </button>
        <div class="collapse" id="dashboard-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li>
              <a class="nav-link {{ Request::is('categories*') ? 'active' : '' }}" href="/dashboard/posts">My Posts</a>
            </li>
            {{-- <li><a href="#" class="link-dark rounded">Weekly</a></li>
            <li><a href="#" class="link-dark rounded">Monthly</a></li>
            <li><a href="#" class="link-dark rounded">Annually</a></li> --}}
          </ul>
        </div>
      </li>
      {{-- <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
          Orders
        </button>
        <div class="collapse" id="orders-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#" class="link-dark rounded">New</a></li>
            <li><a href="#" class="link-dark rounded">Processed</a></li>
            <li><a href="#" class="link-dark rounded">Shipped</a></li>
            <li><a href="#" class="link-dark rounded">Returned</a></li>
          </ul>
        </div>
      </li> --}}
      <li class="border-top my-3"></li>
      <li class="mb-1">
        @auth
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
          Hai, {{ auth()->user()->name }}
        </button>
        <div class="collapse" id="account-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li>
              <a class="nav-link {{ Request::is('about*') ? 'active' : '' }}" href="/about">My Profile</a>
            </li>
            {{-- <li>
                <form action="/logout" method="post">
                  @csrf
                  <button type="submit">Logout</button>
                </form>
            </li>
            @else
            <li>
              <a href="/login" class="nav-link {{ Request::is('login') ? 'active' : '' }}">Login</a>
            </li> --}}
            @endauth
          </ul>
        </div>
      </li>
    </ul>
  </div>
    </nav>
