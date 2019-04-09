<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <link rel="stylesheet" type="text/css" href="{{ asset ('css/bootstrap.min.css') }}">

        
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">{{ config('app.name') }}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    @if(!Auth::check())
                        <!-- Kalo tidak login -->
                        <!--  menu home -->
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ action('HomeController@index') }}">Home <span class="sr-only">(current)</span></a>
                        </li>

                        <!--  menu login -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ action('LoginController@login') }}">Login</a>
                        </li>
                    @else
                        @php
                            $user = Auth::user();
                        @endphp

                        <!--   login dokter_konsultan -->
                        @if ($user->role =='dokter_konsultan')
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ action('DokterKonsultan\DashboardController@index') }}">Dashboard <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ action('DokterKonsultan\DashboardController@index') }}">Dokter <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ action('DokterKonsultan\DashboardController@index') }}">Pasien <span class="sr-only">(current)</span></a>
                        </li>
                        @endif

                        <!--   login dpjp -->
                        @if ($user->role =='dpjp')
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ action('Dpjp\DashboardController@index') }}">Dashboard <span class="sr-only">(current)</span></a>
                        </li>
                        @endif

                         @if ($user->role =='kepala_klinik')
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ action('KepalaKlinik\DashboardController@index') }}">Dashboard <span class="sr-only">(current)</span></a>
                        </li>
                        @endif



                        <!-- menu logout semua user -->
                         <li class="nav-item active">
                            <a class="nav-link" href="{{ action('LoginController@logout') }}">Logout  <span class="sr-only">(current)</span></a>
                        </li>
                    @endif

                </ul>
            </div>
        </nav>

        @yield('body')

        <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/popper.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    </body>
</html>
