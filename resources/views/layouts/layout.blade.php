<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo')</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="navbar1">
        <div class="container">
            <a class="navbar-brand" href="{{ route('inicio') }}">
                <img src="{{ asset('img/moon.png') }}" alt="Logo" class="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" style="color:rgb(255, 255, 255)" ; href="#" id="res"" role="
                            button" data-bs-toggle="dropdown" aria-expanded="true"> Nominas

                        </a>
                        <ul class="dropdown-menu  dropdown-menu-dark dropdown-menu-macos mx-0 border-0 shadow"
                            style="width: 220px" aria-labelledby="navbarDropdownMenuLink" id="navbarDropdownMenuLink">
                            <li>
                                <a class="dropdown-item d-flex align-items-center gap-2 py-2"
                                    href="{{ route('nominas.create') }}">
                                    <span class="d-inline-block bg-success rounded-circle"
                                        style="width: .5em; height:.5em"></span>Registrar
                                    Empleado
                                </a>
                            </li>
                            <hr class="dropdown-divider">
                            <li>
                                <a class="dropdown-item d-flex align-items-center gap-2 py-2"
                                    href="{{ route('nominas.index') }}">
                                    <span class="d-inline-block bg-danger rounded-circle"
                                        style="width: .5em; height:.5em"></span>Listar empleados
                                </a>
                            </li>
                        </ul>
                    </li>






                </ul>

                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search"
                        name="buscar">
                    <button class="btn btn-outline-light" type="submit">Buscar</button>
                </form>
            </div>

            <br><br>

            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item" id="bti">
                            <a class="nav-link" id="bti" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item" id="bti">
                            <a class="nav-link" id="bti" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown" id="bti">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre id="bti">
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();" id="bti">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"
                                id="bti">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>


    <div class="container">
        @yield('content')
    </div>


    <script src="{{ asset('js/app.js') }}"></script>

</body>

</html>
