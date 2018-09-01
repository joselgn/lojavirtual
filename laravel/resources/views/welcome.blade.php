<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('libraries/css/materiallize.css') }}" rel="stylesheet">

    </head>
    <body>
        <nav>
            <div class="nav-wrapper">
                <a href="{{ url('/') }}" class="brand-logo right">Jose Carlos Fernandes</a>
                <ul id="nav-mobile" class="left hide-on-med-and-down">
                    @if (Route::has('login'))
                        <div class="top-right links">
                            @auth
                                <li><a href="{{ url('/home') }}">Meu Carrinho</a></li>
                                <li><a href="{{ url('/logout') }}">Sair</a></li>
                            @else
                                <li><a href="{{ route('login') }}">Login</a></li>
                                <li><a href="{{ url('/registro') }}">Cadastrar-se</a></li>
                            @endauth
                        </div>
                    @endif
                </ul>
            </div>
        </nav>


        <!-- Scripts Libraries -->
        <script src="{{ asset('libraries/js/materiallize.js') }}" defer></script>
        <script src="{{ asset('libraries/js/jQuery.js') }}" defer></script>

        <!-- Scripts -->
        <script src="{{ asset('js/basic.js') }}"></script>
    </body>
</html>
