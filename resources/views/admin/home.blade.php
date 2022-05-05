@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <hr />
            <h3>Notícias Recentes</h3>
            <hr />
        </div>
        @foreach ($getNoticias as $noticias)
            <div class="col-md-4">
                <div class="card" style="width: 100%;">
                    <a href="/noticia/single/{{ $noticias->id }}">
                        <img class="card-img-top" src="{{ asset($noticias->img) }}" alt="{{ $noticias->title }}"
                            style="height: 12em; width:100%;" />
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="/noticia/single/{{ $noticias->id }}">
                                {{ $noticias->title }}
                            </a>
                        </h5>
                        <p class="card-text">{{ $noticias->description_min }}</p>
                        <a href="/noticia/single/{{ $noticias->id }}" class="btn btn-primary">Ver mais</a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

@endsection
