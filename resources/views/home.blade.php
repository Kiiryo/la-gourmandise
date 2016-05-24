@extends('layouts.app')

@section('content')
    <div class="container margin">
        <div class="row">
            @include('errors.message')
            <h3 class="container-home">Nouveautés :</h3>
            @foreach($list as $recette)
                <div class=" col-md-6 col-xs-12">
                    <div class="col-md-4 col-xs-4 img-home">
                        <img src="{{asset('img/crepe.JPG')}}" alt="" class="img_recette">
                    </div>
                    <div class="col-md-8 col-xs-8">
                        <a href="{{route('recette.show', $recette->id)}}">
                            <h4>{{$recette->id}}. {{$recette->title}}</h4>
                        </a>
                        <p class="auteur">Par :{{$recette->username}}</p>
                        <p>{{$recette->description}}</p>
                        <p>Type de recette : {{$recette->category}}</p>
                    </div>
                </div>
            @endforeach
            <h3>Recette du jour :</h3>
            <div class=" col-md-6 col-xs-12">
                <div class="col-md-4 col-xs-4 img-home">
                    <img src="{{asset('img/crepe.JPG')}}" alt="" class="img_recette">
                </div>
                <div class="col-md-8 col-xs-8">
                    <a href="{{route('recette.show', $recette->id)}}">
                        <h4>Gateaux asiatique</h4>
                    </a>
                    <p class="auteur">Par Julien Xu</p>
                    <p>Une recette tres special, pour les fans de l'asie</p>
                    <p>Type de recette : Gateaux</p>
                </div>

            </div>
        </div>

    </div>
@endsection
