<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel')}} - {{  !empty($meta_title) ? $meta_title :''}}</title>

    <!-- Styles -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/weather-icons.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('css/main.css')}}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{asset('js/jquery-2.1.3.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        @include('layouts.partials.header')
        <div class="main_container container">
            @yield('content')
        </div>
        @include('layouts.partials.footer')
    </div>


    <!-- Scripts -->
    <script src="{{asset('js/app.js')}}"></script>

</body>
</html>
