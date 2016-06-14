@extends('layouts.app')

@section('content')
    <div class="container margin">
            @include('errors.message')
            <h3 class="container-home">Nouveautés :</h3>
        <div class="row">
            @foreach($list as $recette)
                <div class=" col-md-6 col-xs-6">
                    <div class="col-md-4 col-xs-12 img-home">
                        <img src="{{asset('img/recet_img/'.$recette->id.$recette->image)}}" alt="" class="img_recette">
                    </div>
                    <div class="col-md-8 col-xs-12">
                        <a href="{{route('recette.show', $recette->id)}}">
                            <h4>{{$recette->title}}</h4>
                        </a>
                        <p class="auteur">Par :{{$recette->username}}</p>
                    </div>
                </div>
            @endforeach
        </div>
            <h3>Recette du jour :</h3>
            <div class=" col-md-6 col-xs-12">
                <div class="col-md-4 col-xs-4 img-home">
                    <img src="{{asset('img/crepe.JPG')}}" alt="" class="img_recette">
                </div>
                <div class="col-md-8 col-xs-8">
                    <a href="">
                        <h4>Gateaux asiatique</h4>
                    </a>
                    <p class="auteur">Par Julien Xu</p>
                    <p>Une recette tres special, pour les fans de l'asie</p>
                    <p>Type de recette : Gateaux</p>
                </div>

            </div>

    </div>
@endsection
