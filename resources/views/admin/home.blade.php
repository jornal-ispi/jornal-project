@extends('layouts.app')
@section('content')
    <div class="row">
        @foreach ($getNoticias as $noticias)
            <div class="col-md-4">
                <div class="card" style="width: 100%;">
                    <img class="card-img-top" src="{{ asset($noticias->img) }}" alt="{{ $noticias->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $noticias->title }}</h5>
                        <p class="card-text">{{ $noticias->description_min }}</p>
                        <a href="/noticia/single/{{ $noticias->id }}" class="btn btn-primary">Ver mais</a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

@endsection
