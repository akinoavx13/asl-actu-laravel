<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Actu ASLectra">
    <link rel="icon" href="{{ asset('favicon.ico') }}" />
    <link rel="shortcut-icon" href="{{ asset('favicon.ico') }}" />

    <title>
        @yield('title')
    </title>

    <link href="{{ asset('css/app.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/app.min.css') }}" rel="stylesheet" type="text/css" media="print" />
    <link href="{{ asset('css/app.min.css') }}" rel="stylesheet" type="text/css" media="screen and (min-width: 550px)" />
    <style>
        .nav .open > a, .nav .open > a:focus, .nav .open > a:hover {
            background-color: #0273A3;
            border-color: #337ab7;
        }

        .navbar-default .navbar-nav > .open > a, .navbar-default .navbar-nav > .open > a:focus, .navbar-default .navbar-nav > .open > a:hover {
            color: #555;
            background-color: #0273A3;
        }
    </style>

</head>
<body id="app-layout">

@include('navbar.navbar-top')

<div class="container">

    <div class="row">
        <div class="col-md-12">
            @include('flash')
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @yield('content')
        </div>

    </div>

    <footer class="footer">
        <div class="container">
            <p class="text-muted text-center">
                <a href="http://maxime.maheo.free.fr">Créer par Maxime MAHEO</a>
            </p>
        </div>
    </footer>

</div>

<script src="{{ asset('js/app.min.js') }}"></script>

@yield('javascript')

</body>
</html>
