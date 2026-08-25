<!-- ─── HEADER ─── -->
<header>
  <button class="hamburger" onclick="toggleSidebar()" aria-label="Menu">
    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
      <line x1="3" y1="6" x2="21" y2="6" />
      <line x1="3" y1="12" x2="21" y2="12" />
      <line x1="3" y1="18" x2="21" y2="18" />
    </svg>
  </button>

  <!-- Logo -->
  <a class="logo" href="#">
    <div class="logo-icon">NX</div>
    <span class="logo-name">Nexus</span>
  </a>

  <!-- Search -->
  <div class="search-wrap">
    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
      <circle cx="11" cy="11" r="8" />
      <line x1="21" y1="21" x2="16.65" y2="16.65" />
    </svg>
    <input type="text" placeholder="Search anything…" />
  </div>



  @guest
    <div class="header-actions">
      <a href="{{ route('login') }}">
        <button class="btn btn-outline text-white">Login</button>
      </a>
      <a href="{{ route('register') }}">
        <button class="btn btn-primary">Register</button>
      </a>
    </div>
  @endguest

  @auth
    <div class="d-flex justify-contnet-between ">
        <a href="{{ route('dashboard.profile.edit')}}">
          <button class="btn border-1 text-white">{{Auth::user()->name}}</button>
        </a>
    </div>
  @endauth
</header>