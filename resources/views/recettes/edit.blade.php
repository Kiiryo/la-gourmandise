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
                        @if(Auth::check() && (Auth::user()->id == $recette->user_id || Auth::user()->isAdmin))
                            {!! Form::model($recette, array(
                                    'route' => array('recette.update', $recette->id),
                                    'method' => 'PUT'
                                    ))
                                !!}

                        <div class="form-group">
                            {!! Form::text('title', old('title'), [
                            'class' => 'form-control',
                            'placeholder' => 'Name de la Recette'
                            ]) !!}
                        </div>

                        <label for="">Descriptif de la recette</label>
                        {!! Form::textarea('description', old('description'), [
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
                        {!! Form::textarea('recette', old('recette'), [
                                  'class' => 'form-control',
                                  'placeholder' => 'Etapes de la recettes'
                              ]) !!}

                        <div class="form-group">
                            <label>Difficultés de la recette</label>

                            {!! Form::select('difficulte', array(
                            'facile' => 'Facile',
                            'moyen' =>'Moyen',
                            'difficile' =>'Difficile',
                            ),[
                            'class' => 'form-control', 'style'=>'display:inline;'])
                            !!}

                            @if(Auth::check() && Auth::user()->admin ==1))
                            <div class="form-group">
                                <label>Projet validé</label>
                                @if($recette->validate == 0)
                                    {!! Form::checkbox('validate', '1') !!}
                                @else($recette->validate == 1)
                                    {!! Form::checkbox('validate', 'smallInteger', true) !!}
                                @endif
                            </div>
                            @endif
                            <br/>
                        </div>

                        {!! Form::submit('Envoyer', ['class' => ' form-control']) !!}

                        {!! Form::close() !!}
                        @else
                            <h4>Vous n'avez pas les droits suffisants !</h4>
                            <div class="form-group"  style="text-align: center;">
                                <a href="{{ route('recette.index') }}"><button class="btn btn-warning">Retour aux Recettes</button></a>
                            </div>

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection