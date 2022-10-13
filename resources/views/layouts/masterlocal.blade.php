<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'fransabank') }}</title>


  <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
  <link rel="stylesheet" href="{{ url('/css/custom2.css') }}">


  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


  <style>
    .nav-newcolor p {
      color: white;

    }

    .nav-newcolor p:hover {
      color: yellow;

    }
  </style>
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper" id="app">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
        </li>
      </ul>

      <ul class="navbar-nav ml-auto">


        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item" style="margin-top: 7px;">
          Welcome, {{ Ucfirst(Auth::user()->firstname) }}
        </li>
      </ul>

      <!-- SEARCH FORM -->
      <!-- <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fa fa-search"></i>
            </button>
          </div>
        </div>
      </form> -->

    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar  elevation-2 navbaa">
      <!-- Brand Logo -->
      <router-link to="/dashboard" class="brand-link">
        <img src="{{ asset('/images/fransabanklogo.jpg') }}" alt="The Logo" class="imgg " style="opacity: .8">
        <span class="brand-text font-weight-light">
          <H1 style="visibility: hidden;"> FI</H1>
        </span>
      </router-link>

      <!-- Sidebar -->
      <div class="sidebar" style="margin-top: -100px;">
        <!-- Sidebar user panel (optional) -->
        <router-link to="/profile">
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <!-- <div class="image">
              <img src="{{ auth()->user()->photo }}" class="img-circle elevation-2" alt="User Image">
            </div> -->
            <!-- <div class="info">

              <span class="d-block text-muted">

                {{ Ucfirst(Auth::user()->firstname) }}
                {{ Ucfirst(Auth::user()->lastname) }}

              </span>
            </div> -->
          </div>
        </router-link>

        <!-- Sidebar Menu -->
        @include('layouts.sidebar-menu')
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    {{-- Content Wrapper. Contains page content --}}
    <div class="content-wrapper" style="background-color:#e3eaf2">
      {{-- Main content --}}

      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          {{-- <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row --> --}}
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <main class="" style="margin-left: -2opx;">
        @yield('content')
      </main>

      {{-- /.content --}}
    </div>
    {{-- /.content-wrapper --}}

    {{-- Main Footer --}}
    <!-- <footer class="main-footer">
      {{-- To the right --}}
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.0.0
      </div>
      {{-- Default to the left --}}
      <strong>Copyright &copy; <?php echo date("Y"); ?>
        <a href=""> BHL </a>.</strong> All rights reserved.
    </footer> -->
  </div>
  {{-- ./wrapper --}}


  @include('layouts.auth')

  <script>
    function isNumber(evt) {
      evt = (evt) ? evt : window.event;
      var charCode = (evt.which) ? evt.which : evt.keyCode;
      if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
      }
      return true;
    }
  </script>


  <script src="{{ mix('/js/app.js') }}"></script>

</body>

</html>