<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item">
      <router-link to="/dashboard" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt blue"></i>
        <p>
          Dashboard
        </p>
      </router-link>
    </li>
    @if (Route::has('login'))
    <li class="nav-item">
      @auth
      <a href="{{ url('/home') }}" class="nav-link">
        <i class="nav-icon fas fa-question green"></i>
        <p>
          Go Home
        </p>
      </a>
    </li>
    @else
    <li class="nav-item">
      <a href="{{ route('login') }}" class="nav-link">
        <i class="nav-icon fas fa-sign-in-alt green"></i>
        <p>
          Login
        </p>
      </a>
    </li>
    @if (Route::has('register'))
    <li class="nav-item">
      <a href="{{ route('register') }}" class="nav-link">
        <i class="nav-icon fas fa-registered blue"></i>
        <p>
          Register
        </p>
      </a>
      @endif
      @endauth
    </li>
    @endif














  </ul>
</nav>