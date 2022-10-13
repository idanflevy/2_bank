<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">



  <title>{{ config('', 'Home - MeteorsBank') }}</title>


  <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
  <link rel="stylesheet" href="{{ url('/css/custom.css') }}">

  <style>
    /* personal css */
  </style>
</head>

<body class=" ">


  <div class="nav-menu">
    <div class="logo1">

      <div>
        <img class="img1" src="{{asset('/images/newlogo.png')}}" alt="">

      </div>

      <div class="logotext">
        Meteorsbank
      </div>
    </div>
    @include('layouts.nav-web')
  </div>
  @include('layouts.nav-web2')

  <div>
    @yield('content')
  </div>







  <!-- Footer -->
  <footer class="page-footer font-small blue pt-4">



    <!-- Copyright -->
    <div class=" footer-copyright text-center py-3" style="color: #b2b4b7;">Copyright © 2021 Fransabank. All rights reserved <br />
      No.1 on the list of banks. BDL Authorization No. 11/438 dated 21.09.2006. Designed and developed by Borninteractive
      <a href="/"></a>
    </div>
    <!-- Copyright -->

  </footer>
  <!-- Footer -->





  <!-- @auth
  <script>
 window.user=@json(auth()->user())
  </script>
  @endauth -->


  <script src="{{ mix('/js/app.js') }}"></script>

  <script>
    // $('.toggle-btn').on('click', function() {
    //     $(this).toggleClass('active')
    // });
    $(document).ready(function() {
      $(".pro-toggle").on("click", function() {
        $(".top-bar").toggleClass("active");
      });
    });
  </script>
</body>

</html>