@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h4>{{ $menu }}</h4>
            <hr />
            <h3>Dados do Usuário</h3>
            <hr />
        </div>
        <div class="col-md-8">
            <b>Nome de Usuário:</b> {{ $getUser->username }}<br />
            <b>Código:</b> {{ $getUser->codigo }}<br />
            <b>Estado:</b> {{ $getUser->estado }}<br />
        </div>
        <div class="col-md-4">

        </div>
    </div>

@endsection
