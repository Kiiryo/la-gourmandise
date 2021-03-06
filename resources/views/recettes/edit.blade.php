@extends('layouts.app')

@section('content')
    <div class="container margin">
        <div class="row">
            @include('errors.message')
            <div class="col-md-10 col-md-offset-1">
                <h2 class="recette-titre">Modifiez votre recette !</h2>
                    <div class="panel-body">
                        @if(Auth::check() && (Auth::user()->id == $recette->user_id || Auth::user()->admin == 1))
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

                            @if(Auth::check() && Auth::user()->admin ==1)
                            <div class="form-group">
                                <label>Recette validé</label>
                                @if($recette->validate == 0)
                                    {!! Form::checkbox('validate', '1') !!}
                                @else($recette->validate == 1)
                                    {!! Form::checkbox('validate', '0') !!}
                                @endif
                            </div>
                                <div class="form-group">
                                    <label>Recette du jour</label>
                                    @if($recette->jour == 0)
                                        {!! Form::checkbox('jour', '1') !!}
                                    @else($recette->jour == 1)
                                        {!! Form::checkbox('jour', '0') !!}
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
@endsection