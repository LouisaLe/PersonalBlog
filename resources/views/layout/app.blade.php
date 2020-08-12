<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>The Simple One</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('lib/css/bootstrap.min.css') }}">
    </link>
    
    <!-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"></link> -->
    <link rel="stylesheet" href="{{ asset('../resources/sass/app.css') }}">
    </link>
</head>

<body>
    @yield('content')

    @include('layout.footer')

    <script src="{{ asset('lib/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('lib/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
</body>

</html>