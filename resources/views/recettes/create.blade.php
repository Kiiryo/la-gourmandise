@extends('layouts.app')

@section('content')
    <div class="container margin">
        <div class="row">
            @include('errors.message')
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Votre recette !</div>
                </div>
                <h1>Postez votre recette sur La Gourmandise</h1>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Le formulaire de soumission
                    </div>
                    <div class="panel-body">
                        {!! Form::open(['route' => 'recette.store', 'method' => 'POST', 'files' => 'true']) !!}

                        <div class="form-group">
                            {!! Form::text('title', null, [
                            'class' => 'form-control',
                            'placeholder' => 'Name de la Recette'
                            ]) !!}
                        </div>

                        <label for="">Descriptif de la recette</label>
                        {!! Form::textarea('description', null, [
                                  'class' => 'form-control',
                                  'placeholder' => 'Description recettes'
                              ]) !!}


                        <div class="form-group">
                            <label>Type de recette</label>

                            {!! Form::select('category', array(
                            'gateau' => 'Gateaux',
                            'patisserie' =>'Patisserie',
                            'viennoiserie' =>'Viennoiserie',
                            'dessert' =>'Dessert',
                            ),[
                            'class' => 'form-control', 'style'=>'display:inline;'])
                            !!}

                            <br/>
                        </div>

                        <label for="">La recette par étapes </label>
                        {!! Form::textarea('recette', null, [
                                  'class' => 'form-control',
                                  'placeholder' => 'Etapes de la recettes'
                              ]) !!}

                        <label for="">Image de la recette </label>
                        {!! Form::file('image', null) !!}
                        <br>

                        <div class="form-group">
                            <label>Difficultés de la recette</label>

                            {!! Form::select('difficulte', array(
                            'facile' => 'Facile',
                            'moyen' =>'Moyen',
                            'difficile' =>'Difficile',
                            ),[
                            'class' => 'form-control', 'style'=>'display:inline;'])
                            !!}

                            <br/>
                        </div>

                        {!! Form::submit('Envoyer', ['class' => ' form-control']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection