@extends('layouts.app')

@section('content')
    <div class="container margin">
        <div class="row">
            @include('errors.message')
            <div class="col-md-10 col-md-offset-1">
                <h2 class="recette-titre"><strong>Ajouter une recette</strong></h2>

                    <div class="panel-body">
                        {!! Form::open(['route' => 'recette.store', 'method' => 'POST', 'files' => 'true']) !!}

                        <div class="form-group">
                            {!! Form::text('title', null, [
                            'class' => 'form-control',
                            'placeholder' => 'Name de la Recette'
                            ]) !!}
                        </div>

                        {!! Form::textarea('description', null, [
                                  'class' => 'form-control',
                                  'placeholder' => 'Description recettes'
                              ]) !!}


                        <div class="form-group">
                            <label>Types de recette</label>
                            {!! Form::select('category', array(
                            'Gateau' => 'Gateaux',
                            'Patisserie' =>'Patisserie',
                            'Viennoiserie' =>'Viennoiserie',
                            'Dessert' =>'Dessert',
                            ),[
                            'class' => 'form-control', 'style'=>'display:inline;'])
                            !!}

                        </div>

                        {!! Form::textarea('recette', null, [
                                  'class' => 'form-control',
                                  'placeholder' => 'Etapes de la recettes'
                              ]) !!}

                        <label for="">Image de la recette </label>
                        {!! Form::file('image', null) !!}

                        <div class="form-group">
                            <label>Difficultés de la recette</label>

                            {!! Form::select('difficulte', array(
                            'facile' => 'Facile',
                            'moyen' =>'Moyen',
                            'difficile' =>'Difficile',
                            ),[
                            'class' => 'form-control','placeholder' => 'test', 'style'=>'display:inline;'])
                            !!}
                            <br>
                        </div>

                        {!! Form::submit('Envoyer', ['class' => ' form-control']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection