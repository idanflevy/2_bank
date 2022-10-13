<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'fransabank') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('/css/custom.css') }}">

    <style>
        .label {
            align-items: left;
        }
    </style>

</head>

<body>
    <div id="app">





        <main class="py-4 ">
            @yield('content')
        </main>


        <div style="height: 40px; background-color:gray;">

        </div>
    </div>
    <script>
        $('#buttonID').prop("disabled", true);
        $('input:checkbox').click(function() {
            if ($(this).is(':checked')) {
                $('#buttonID').prop("disabled", false);
            } else {
                if ($('.chk').filter(':checked').length < 1) {
                    $('#buttonID').attr('disabled', true);
                }
            }
        });
    </script>

</body>

</html>