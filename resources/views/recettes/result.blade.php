@extends('layouts.app')

@section('content')
    <div class="container margin">
        <div class="row">
            @include('errors.message')
            <h3>Résultat de la recherche <b>"{{$query}}"</b></h3>
            @if (count($recettesfound) === 0)
                <h4>Pas de recettes trouvés</h4>
                <a href="{{route('recette.index')}}" class="btn btn-warning">Retour a la liste des recettes</a>
            @elseif (count($recettesfound) >= 1)
            @foreach($recettesfound as $recettesfound)
                <div class=" col-md-6 col-sm-12 col-xs-12">
                    <div class="col-md-5 col-xs-5">
                        <img src="{{asset('img/recet_img/'.$recettesfound->id.$recettesfound->image)}}" alt="" class="img_recette">
                    </div>
                    <div class="col-md-7 col-xs-7">
                        <a href="{{route('recette.show', $recettesfound->id)}}">
                            <h3>{{$recettesfound->title}}</h3>
                        </a>
                        <p class="auteur">Par :{{$recettesfound->username}}</p>
                        <h4>{{str_limit($recettesfound->description, 100)}}</h4>
                        <p>Type de recette : {{$recettesfound->category}}</p>
                    </div>
                    <hr/>
                </div>
            @endforeach
            @endif
    {{--{!! $list->links() !!}--}}
        </div>
    </div>
@endsection