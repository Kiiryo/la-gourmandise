@extends('layouts.app')

@section('content')
    <div class="container margin">
            @include('errors.message')
            <h3>Résultat de la recherche <b>"{{$query}}"</b></h3>
            @if (count($recettesfound) === 0)
                <h4>Pas de recettes trouvés</h4>
                <a href="{{route('recette.index')}}" class="btn btn-warning">Retour a la liste des recettes</a>
            @elseif (count($recettesfound) >= 1)
            @foreach($recettesfound as $recettesfound)
                @if($recettesfound->validate == 1)
                <div class=" col-md-6 col-sm-12 col-xs-12 list-recette">
                    <div class="img-recettes col-md-4 col-xs-4">
                        <img src="{{asset('img/recet_img/'.$recettesfound->id.$recettesfound->image)}}" alt="" class="img-list">
                    </div>
                    <div class="col-md-8 col-xs-8 p-recettes">
                        <a href="{{route('recette.show', $recettesfound->id)}}">
                            <h4 class="titre-recette">{{$recettesfound->title}}</h4>
                        </a>
                        <p>{{$recettesfound->category}}</p>
                        <p>{{$recettesfound->difficulte}}</p>
                    </div>
                    <hr/>
                </div>
                @endif
            @endforeach
            @endif
    {{--{!! $list->links() !!}--}}
        </div>
@endsection