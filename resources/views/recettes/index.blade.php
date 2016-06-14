@extends('layouts.app')

@section('content')
    <div class="container margin">
        <h2 class="recette-titre">Toutes nos recettes</h2>
            @include('errors.message')
            @foreach($list as $recette)
                @if($recette->validate == 1)
                    <div class=" col-md-6 col-sm-12 col-xs-12 list-recette">
                        <div class="img-recettes col-md-4 col-xs-4">
                            <img src="{{asset('img/recet_img/'.$recette->id.$recette->image)}}" alt="" class="img-list">
                        </div>
                        <div class="col-md-8 col-xs-8 p-recettes">
                            <a href="{{route('recette.show', $recette->id)}}">
                                <h4 class="titre-recette"> {{$recette->title}}</h4>
                            </a>
                            <!--<p class="auteur">{{$recette->username}}</p>-->
                            <p>{{$recette->category}}</p>
                            <p>{{$recette->difficulte}}</p>
                        </div>
                        <hr/>
                    </div>
                @endif
            @endforeach
            {!! $list->links() !!}
    </div>
@endsection