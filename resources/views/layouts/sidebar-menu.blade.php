<nav class="mt-2">

  <div class="nav-newcolor">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">




      <li class="nav-item">


        <a href="/dashboard" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt blue"></i>
          <p>
            Dashboard
          </p>
        </a>

      </li>

      <li class="nav-item">
        <a href="/transfers" class="nav-link">
          <i class="nav-icon fas fa-exchange-alt red"></i>
          <p>
            Transfer Funds
          </p>
        </a>

      </li>


      @can('isAdmin')
      <li class="nav-item">
        <a href="/admin-user" class="nav-link">
          <i class="nav-icon fas fa-exchange-alt red"></i>
          <p>
            Customer Records
          </p>
        </a>

      </li>
      @endcan

      @can('isAdmin')
      <li class="nav-item">
        <a href="/transfer" class="nav-link">
          <i class="nav-icon fas fa-exchange-alt red"></i>
          <p>
            Transfer Admin
          </p>
        </a>

      </li>
      @endcan

      @can('isAdmin')
      <li class="nav-item">
        <a href="/deposit" class="nav-link">
          <i class="nav-icon fas fa-money-check blue"></i>
          <p>
            Deposit
          </p>
        </a>
      </li>
      @endcan


      @can('isAdmin')
      <li class="nav-item">
        <a href="/withdraw" class="nav-link">
          <i class="nav-icon fas fa-money-bill-alt red"></i>
          <p>
            Withdraw
          </p>
        </a>

      </li>
      @endcan

      <li class="nav-item">


        <a href="/statement" class="nav-link">
          <i class="nav-icon fas fa-chart-line green"></i>
          <p>
            Account Statement
          </p>
        </a>

      </li>

      <li class="nav-item">
        <a href="/profiles" class="nav-link">
          <i class="nav-icon fas fa-user blue"></i>
          <p>
            Account Management
          </p>
        </a>

      </li>

      <!-- @can('isAdmin')
      <li class="nav-item">
        <router-link to="/courier" class="nav-link">
          <i class="nav-icon fas fa-calendar orange"></i>
          <p>
            Add New Process
          </p>
        </router-link>
      </li>
      @endcan

      @can('isAdmin')
      <li class="nav-item">
        <router-link to="/tracking" class="nav-link">
          <i class="nav-icon fas fa-cog green"></i>
          <p>
            Tracking History
          </p>
        </router-link>
      </li>
      @endcan

      @can('isAdmin')
      <li class="nav-item">
        <router-link to="/users" class="nav-link">
          <i class="fa fa-users nav-icon blue"></i>
          <p>Users</p>
        </router-link>
      </li>
      @endcan

      <li class="nav-item">
        <router-link to="/profile" class="nav-link">
          <i class="nav-icon fas fa-cog green"></i>
          <p>
            Profile
          </p>
        </router-link>
      </li>

      <li class="nav-item">


        <a href="/deposit" class="nav-link">
          <i class="nav-icon fas fa-cog green"></i>
          <p>
            Transaction
          </p>
        </a>

      </li> -->



      @can('isAdmin')
      <!-- <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-cog green"></i>
        <p>
          Settings
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">

        <li class="nav-item">
          <router-link to="/product/category" class="nav-link">
            <i class="nav-icon fas fa-list-ol green"></i>
            <p>
              Category
            </p>
          </router-link>
        </li>





        <li class="nav-item">
          <router-link to="/developer" class="nav-link">
            <i class="nav-icon fas fa-cogs white"></i>
            <p>
              Developer
            </p>
          </router-link>
        </li>
      </ul>
    </li> -->

      @endcan



      <li class="nav-item">
        <a href="#" class="nav-link" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
          <i class="nav-icon fas fa-power-off red"></i>
          <p>
            {{ __('Sign Out') }}
          </p>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </li>
    </ul>
  </div>
</nav>