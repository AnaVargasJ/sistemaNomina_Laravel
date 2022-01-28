
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <title>Sistema de Nominas</title>
</head>

<body class ="bare" >


    <header class="check" id="navbar2">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="background-color: rgb(255, 255, 255)">
            <div class="container">
                <a class="navbar-brand" href="{{ ('inicio') }}">
                    <img src="{{ asset('img/moon.png') }}" alt="Logo" class="logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">





                    </ul>
                    {{-- <ul class="navbar-nav ms-auto" >
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link"  style="color: white" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link"  style="color: white"" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown" >
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul> --}}
                </div>
            </div>
        </nav>

    </header>


    <div class="position-absolute top-50 start-50 translate-middle">
        <div class="titulo-principal">Bienvenidos</div>
        <br>
        <div class="row">
            <div class="d-grid gap-2 col-6 mx-auto"><a href="{{ route('register') }}" class="super">Registrar</a></div>
            <div class="d-grid gap-2 col-6 mx-auto"><a href="{{ route('login') }}" class="super">Ingresar</a></div>
        </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

