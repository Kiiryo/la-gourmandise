@extends('layouts.app')

@section('content')
    <div class="container margin">
        <div class="row">
            @include('errors.message')
            <div class="container">
                <h2 class="titre-compte">Vous pouvez modifier votre compte ici</h2>
            </div>

            <div class="container">
                <h3> Modifier le profil de : <font color="#eb6b56">{{$user->name}}</font>  </h3>

                {!! Form::open(['url' => route('compte.update', $user->id), 'method' => 'PUT']) !!}
                {{ csrf_field() }}

                <label for="name"> Nom </label>
                {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
                <br>
                <label for="email"> Email </label>
                {!! Form::text('email', $user->email,['class' => 'form-control']) !!}
                <br>
                <label for="password"> Nouveau mot de passe </label><br>
                {!! Form::password('password', ['class' => 'form-control']) !!}
                <br>

                <!-- <label for="password_confirmation"> Confirmez votre mot de passe </label><br>
        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                        <br>-->

                {!! Form::submit('Envoyer', ['class' => 'btn connexion valid-modif']) !!}
                {!! Form::close() !!}


                @if($errors)
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                @endif
            </div>

        </div>
    </div>
@endsection