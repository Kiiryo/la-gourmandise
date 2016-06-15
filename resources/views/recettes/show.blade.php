@extends('layouts.app')

@section('content')
    <div class="container-fluid margin">
        <div class="row">
            @include('errors.message')
            <div class="col-md-12 col-xs-12 img-slide">
                <img src="{{asset('img/recet_img/'.$recette->id.$recette->image)}}" alt="" class="img-detail">
            </div>
            <div class="col-md-12 col-xs-12 descrip-titre">
                   <h3 class="titre-detail text-center">
                       {{$recette->title}}
                   </h3>
            </div>
            <div class="col-md-12 col-xs-12 descrip-all">
                <div class="icon">
                    <div class="col-xs-4 text-center border-right">
                        <i class="fa fa-cutlery fa-detail" aria-hidden="true"></i>
                        <p>{{$recette->category}}</p>
                    </div>
                    <div class="col-xs-4 text-center border-right">
                        <i class="fa fa-line-chart fa-detail" aria-hidden="true"></i>
                        <p>{{$recette->difficulte}}</p>
                    </div>
                    <div class="col-xs-4 text-center ">
                        <i class="fa fa-user fa-detail " aria-hidden="true"></i>
                        <p>{{ $recette->username }}</p>
                    </div>
                </div>

                   <p><b>Description: </b><br>{{$recette->description}}</p>

                   <p><b>Etapes de la recette: </b><br>{{$recette->recette}}</p>


                   @if(Auth::check() && (Auth::user()->id == $recette->user_id || Auth::user()->admin ==1))
                   <a href="{{ route('recette.edit', $recette->id)}}" class="btn btn-success btn-line btn-rect">
                       <i class="fa fa-pencil"></i> Editer
                   </a>
                   {!! Form::model($recette, array('route' => array('recette.destroy', $recette->id), 'method' => 'DELETE')) !!}
                    <button class="btn btn-danger">
                        <i class="fa fa-pencil"></i> supprimer
                    </button>
                   {!! Form::close() !!}

                   @endif
            </div>

        </div>

    </div>
@endsection