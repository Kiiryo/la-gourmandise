@extends('layouts.app')

@section('content')
    <div class="container margin">
        <div class="row">
        @if(Auth::check())
            @include('errors.message')
            <div class="container">
                <h2 class="titre-compte">Vous êtes connecté en temps que {{ Auth::user()->name }} !</h2>
                <div class="modif-compte">
                    <a href="{{route('compte.edit', $user->id)}}">
                        <button class="connexion btn btn-warning">
                            <i class="fa fa-pencil fa-5" aria-hidden="true"></i> Modifier mon profil</button>
                    </a>
                </div>
                <br>
                <div class="deco">

                    <a href="{{ url('/logout') }}">
                        <button class="connexion btn btn-danger">
                            <i class="fa fa-sign-out fa-5" aria-hidden="true"></i> Déconnexion</button>
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