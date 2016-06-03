@extends('layouts.app')

@section('content')
    <div class="container margin">
        <div class="row">
            @include('errors.message')
            @foreach($list as $recette)
                <div class=" col-md-6 col-sm-12 col-xs-12">
                    <div class="col-md-5 col-xs-5">
                        <img src="{{asset('img/recet_img/'.$recette->id.$recette->image)}}" alt="" class="img_recette">
                    </div>
                    <div class="col-md-7 col-xs-7">
                        <a href="{{route('recette.show', $recette->id)}}">
                            <h3>{{$recette->id}}. {{$recette->title}}</h3>
                        </a>
                        <p class="auteur">Par :{{$recette->username}}</p>
                        <h4>{{str_limit($recette->description, 100)}}</h4>
                        <p>Type de recette : {{$recette->category}}</p>
                    </div>
                    <hr/>
                </div>
            @endforeach
            {!! $list->links() !!}
        </div>
    </div>
@endsection