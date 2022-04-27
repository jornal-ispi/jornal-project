@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <hr/>
        <h3>{{$getNoticia->title}}</h3>
            <hr/>
        </div>

            <div class="col-md-12">
                <div class="card" style="width: 100%;">
                    <img class="card-img-top" src="{{ asset($getNoticia->img) }}" alt="{{ $getNoticia->title }}"

                    style="height: 20em;"/>
                    <div class="card-body">
                        <h5 class="card-title">{{ $getNoticia->title }}</h5>
                        <p class="card-text">{{ $getNoticia->description }}</p>

                    </div>
                </div>
            </div>


    </div>

@endsection
