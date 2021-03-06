<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>La Gourmandise</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{asset("css/style.css")}}">

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-static-top partie-top">

        <div class="container col-md-10 col-sm-10 col-xs-12">
            <div class="navbar-header titre-appli">

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    La Gourmandise
                </a>
            </div>
            <div class="clearfix"></div>
        </div>
    </nav>
    <nav class="navbar navbar-static-top partie-top recherche">
        <div class="nav-haut">
            <div class="col-md-2 col-sm-2 col-xs-2">
                <a {{ Request::is('/') ? ' class=hidden ' : null }} class="btn-back compte" href="{{ URL::previous() }}"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
            </div>
            <div class="col-md-8 col-sm-8 col-xs-8 bar-nav">
                {!! Form::open(array('route' => 'queries.search.index', 'class'=>'form navbar-form searchform')) !!}
                {!! Form::text('search', null, array('required',
                                                'class'=>'form-control form-recherche',
                                                'placeholder'=>'Rechercher une recette...')) !!}
            </div>
            <div class=" col-md-2 col-sm-2 col-xs-2 bar-nav">
                <button type="submit" class="btn search"><i class="fa fa-search " aria-hidden="true"></i></button>
            </div>
            {!! Form::close() !!}
        </div>


    </nav>


    <!-- Menu en bas -->
    <nav class="navbar navbar-static-top partie-bottom">
        <div class="container">

            <div class=" navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/') }}"><i class="fa fa-home fa-5" aria-hidden="true"></i><br> <p>Accueil</p></a></li>
                    <li><a href="{{ route('recette.index') }}"><i class="fa fa-list" aria-hidden="true"></i><br> Liste des recettes</a></li>
                    @if(Auth::check())
                        <li><a href="{{ route('recette.create') }}"><i class="fa fa-plus" aria-hidden="true"></i><br> Creer une recette</a></li>
                        <li><a href="{{ route('compte.index') }}"><i class="fa fa-user " aria-hidden="true"></i><br> Mon compte</a></li>
                    @endif
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}"><i class="fa fa-sign-in fa-5" aria-hidden="true"></i><br> Connexion</a></li>
                        <li><a href="{{ url('/register') }}"><i class="fa fa-pencil-square-o fa-5" aria-hidden="true"></i><br> Inscription</a></li>
                    @else
                        <!--<li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Déconnexion</a></li>
                            </ul>
                        </li> -->
                    @endif
                </ul>

            </div>
        </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
