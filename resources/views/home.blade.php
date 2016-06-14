@extends('layouts.app')

@section('content')
    <div class="container margin">
            @include('errors.message')
        <h2 class="gros-titre-home">Bienvenu sur La Gourmandise !</h2>
            <h3 class="titre-home">Nouveautés :</h3>
        <div class="row">
            @foreach($list as $recette)
                @if($recette->validate == 1)
                    <div class=" col-md-6 col-xs-6">
                        <div class="col-md-4 col-xs-12 img-home">
                            <img src="{{asset('img/recet_img/'.$recette->id.$recette->image)}}" alt="" class="img_recette">
                        </div>
                        <div class="col-md-8 col-xs-12">
                            <a href="{{route('recette.show', $recette->id)}}">
                                <h3 class="recet-titre">{{$recette->title}}</h3>
                            </a>
                            <p class="auteur">Par: {{$recette->username}}</p>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
            <h3 class="titre-home">Notre recette du jour :</h3>
            <div class=" col-md-6 col-xs-12">
                <div class="col-md-4 col-xs-4 img-home">
                    <img src="{{asset('img/crepe.JPG')}}" alt="" class="img_recette">
                </div>
                <div class="col-md-8 col-xs-8">
                    <a href="">
                        <h3 class="recet-titre">Gateaux asiatique</h3>
                    </a>
                    <p class="auteur">Par: Julien Xu</p>
                    <p class="description">Une recette tres special, pour les fans de l'asie</p>
                </div>

            </div>

    </div>
@endsection
