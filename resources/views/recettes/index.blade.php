@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('errors.message')
            @foreach($list as $recette)
                <div class="thumbnail col-md-6" style="min-height:100px">

                    <a href="{{route('recette.show', $recette->id)}}">
                        <div class="description" style="font-size:1.4em;">
                            {{$recette->id}}. {{$recette->title}}
                        </div>
                    </a>
                    <p>{{$recette->username}}</p>
                    <p>{{$recette->description}}</p>
                    <p>Type de recette : {{$recette->category}}</p>

                    <br/>
                </div>
            @endforeach
        </div>
    </div>
@endsection