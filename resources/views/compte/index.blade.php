@extends('layouts.app')

@section('content')
    <div class="container margin">
        <div class="row">
        @if(Auth::check())
            @include('errors.message')
            <div class="container">
                <h2 class="titre-compte">Vous êtes connecté en temps que <font color="#eb6b56">{{ Auth::user()->name }}</font> !</h2>
                <br>
                <div class="modif-compte col-md-6 col-sm-6 col-xs-6">
                    <a href="{{route('compte.edit', $user->id)}}">
                        <button class="connexion btn ">
                            <i class="fa fa-pencil fa-5" aria-hidden="true"></i><br> Modifier mon profil</button>
                    </a>
                </div>
                <div class="modif-compte col-md-6 col-sm-6 col-xs-6">
                    <a href="{{ url('compte/mesrecettes') }}">
                        <button class="connexion btn">
                            <i class="fa fa-list fa-5" aria-hidden="true"></i><br>Voir mes recettes</button>
                    </a>
                </div>
                <div class="deco col-md-12 col-sm-12 col-xs-12">
                    <a href="{{ url('/logout') }}">
                        <button class="connexion btn ">
                            <i class="fa fa-sign-out fa-5" aria-hidden="true"></i><br> Déconnexion</button>
                    </a>
                </div>
            </div>


        @else
            <h1>Vous n'êtes pas connecté, veuillez vous connecter !</h1>
            <a href="{{ url('/login') }}"><button class="connexion btn btn-primary"><i class="fa fa-sign-in fa-5" aria-hidden="true"></i> Connexion</button></a>
        @endif
        </div>
    </div>
@endsection