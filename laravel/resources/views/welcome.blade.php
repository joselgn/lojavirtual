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
        <!-- <link href="{{ asset('libraries/bootstrap-shop/themes/bootshop/bootstrap.min.css') }}" rel="stylesheet"> -->  <!-- Default -->
        <link href="{{ asset('libraries/bootstrap-shop/themes/css/bootstrap-responsive.min.css') }}" rel="stylesheet">
        <link href="{{ asset('libraries/bootstrap-shop/themes/css/font-awesome.css') }}" rel="stylesheet">
        <link href="{{ asset('libraries/bootstrap-shop/themes/js/google-code-prettify/prettify.css') }}" rel="stylesheet">
        <link href="{{ asset('libraries/bootstrap-shop/themes/switch/themeswitch.css') }}" rel="stylesheet">
        <link href="{{ asset('libraries/bootstrap-shop/themes/spacelab/bootstrap.min.css') }}" rel="stylesheet">

        <link href="{{ asset('libraries/bootstrap-shop/themes/css/base.css') }}" rel="stylesheet">


    </head>
    <body>
        <!-- Header ================================================== -->
        <div id="header">
            <div class="container">
                <!-- Navbar ================================================== -->
                <div id="logoArea" class="navbar">
                    <a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <div class="navbar-inner">
                        <a class="brand" href="{{ url('/') }}"><img src="{{ asset('libraries/bootstrap-shop/themes/images/logo.png') }}" alt="Jose C. Fernandes"/></a>

                        <!-- FORMULARIO DE PESQUISA -->
                        <form class="form-inline navbar-search" method="post" action="products.html" >
                            <input id="srchFld" class="srchTxt alignR" type="text" placeholder="Buscar por um produto..." />
                            <button type="submit" id="submitButton" class="btn btn-primary">Buscar</button>
                        </form>

                        <!-- MENU -->
                        <ul id="topMenu" class="nav pull-right">
                            @if (Route::has('login'))
                                @auth
                                    <li><a href="{{ url('/home') }}">Meu Carrinho</a></li>
                                    <li><a href="{{ url('/logout') }}">Sair</a></li>
                                @else
                                    <li><a href="{{ route('login') }}">Entrar</a></li>
                                    <li><a href="{{ url('/registro') }}">Cadastrar-se</a></li>
                                @endauth
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End====================================================================== -->

        <!-- SLIDE ====================================================================== -->
        <div id="carouselBlk">
            @yield('conteudo-slide')
        </div>
        <!-- SLIDE END====================================================================== -->

        <!-- CONTEUDO ================================================== -->
        <div id="mainBody">
            <div class="container">
                <div class="row">
                    <!-- Sidebar ================================================== -->
                    <div id="sidebar" class="span3">
                        @yield('conteudo-menu-lateral')
                    </div>
                    <!-- Sidebar end=============================================== -->

                    <!-- CONTEUDO DINAMICO=============================================== -->
                    <div class="span9">
                        <!-- SLIDE NOVOS PRODUTOS -->
                            @yield('conteudo-slide-produtos')
                        <!-- SLIDE NOVOS PRODUTOS END -->

                        <!-- CONTEUDO DINAMICO CENTRAL  -->
                        <div >
                            @yield('conteudo')
                        </div>
                        <!-- CONTEUDO DINAMICO CENTRAL END -->
                    </div>
                    <!-- CONTEUDO DINAMICO END =============================================== -->
                </div>
            </div>
        </div>
        <!-- CONTEUDO END ================================================================== -->

        <!-- Footer ================================================================== -->
        <div  id="footerSection">
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <h5>ACCOUNT</h5>
                        <a href="login.html">YOUR ACCOUNT</a>
                        <a href="login.html">PERSONAL INFORMATION</a>
                        <a href="login.html">ADDRESSES</a>
                        <a href="login.html">DISCOUNT</a>
                        <a href="login.html">ORDER HISTORY</a>
                    </div>
                    <div class="span3">
                        <h5>INFORMATION</h5>
                        <a href="contact.html">CONTACT</a>
                        <a href="register.html">REGISTRATION</a>
                        <a href="legal_notice.html">LEGAL NOTICE</a>
                        <a href="tac.html">TERMS AND CONDITIONS</a>
                        <a href="faq.html">FAQ</a>
                    </div>
                    <div class="span3">
                        <h5>OUR OFFERS</h5>
                        <a href="#">NEW PRODUCTS</a>
                        <a href="#">TOP SELLERS</a>
                        <a href="special_offer.html">SPECIAL OFFERS</a>
                        <a href="#">MANUFACTURERS</a>
                        <a href="#">SUPPLIERS</a>
                    </div>
                    <div id="socialMedia" class="span3 pull-right">
                        <h5>SOCIAL MEDIA </h5>
                        <a href="#"><img width="60" height="60" src="themes/images/facebook.png" title="facebook" alt="facebook"/></a>
                        <a href="#"><img width="60" height="60" src="themes/images/twitter.png" title="twitter" alt="twitter"/></a>
                        <a href="#"><img width="60" height="60" src="themes/images/youtube.png" title="youtube" alt="youtube"/></a>
                    </div>
                </div>
                <p class="pull-right">&copy; Bootshop</p>
            </div><!-- Container End -->
        </div>
        <!-- Footer END ================================================================== -->

        <!-- Scripts Libraries -->
        <script src="{{ asset('libraries/js/jQuery.js') }}"></script>
        <script src="{{ asset('libraries/bootstrap-shop/themes/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('libraries/bootstrap-shop/themes/js/google-code-prettify/prettify.js') }}"></script>
        <script src="{{ asset('libraries/bootstrap-shop/themes/js/bootshop.js') }}"></script>
        <script src="{{ asset('libraries/bootstrap-shop/themes/js/jquery.lightbox-0.5.js') }}"></script>
        <script src="{{ asset('libraries/bootstrap-shop/themes/switch/theamswitcher.js') }}"></script>

        <!-- Scripts -->
        <script src="{{ asset('js/basic.js') }}"></script>
    </body>
</html>
