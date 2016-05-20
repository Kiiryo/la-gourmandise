@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('errors.message')
            @foreach($list as $recette)
                <div class=" col-md-6">
                    <div class="col-md-4">
                        <img src="{{asset('img/crepe.JPG')}}" alt="" class="img_recette">
                    </div>
                    <div class="col-md-8">
                        <a href="{{route('recette.show', $recette->id)}}">
                            <h2>{{$recette->id}}. {{$recette->title}}</h2>
                        </a>
                        <p class="auteur">Par :{{$recette->username}}</p>
                        <h4>{{$recette->description}}</h4>
                        <p>Type de recette : {{$recette->category}}</p>
                    </div>
                    
                </div>
            @endforeach
        </div>
    </div>
@endsection