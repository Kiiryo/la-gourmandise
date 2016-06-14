@extends('layouts.app')

@section('content')
    <div class="container margin">
        <div class="row">
            @include('errors.message')
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{{$recette->title}}</div>
                    <div class="panel-body">
                        <p> Auteur: {{ $recette->username }}</p>
                        <p><b>Descriptif: </b>{{$recette->description}}</p>
                        <p><b>Categorie: </b>{{$recette->category}}</p>
                        <p><b>Etapes de la recette: </b>{{$recette->recette}}</p>
                        <p><b>Difficulté de la recette: </b>{{$recette->difficulte}}</p>

                        @if(Auth::check() && (Auth::user()->id == $recette->user_id || Auth::user()->isAdmin))
                        <a href="{{ route('recette.edit', $recette->id)}}" class="btn btn-success btn-line btn-rect">
                            <i class="fa fa-pencil"></i> Editer
                        </a>
                        {!! Form::model($recette, array('route' => array('recette.destroy', $recette->id), 'method' => 'DELETE')) !!}
                        {!! Form::submit('Supprimer', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}

                        @endif
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection