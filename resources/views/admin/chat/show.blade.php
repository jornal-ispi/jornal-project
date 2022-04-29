@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h4>{{ $menu }}</h4>
            <hr />
            <h3>Mensagem</h3>
            <hr />
        </div>
        <div class="col-md-8">
            <b>Usuário Enviou:</b> {{ $getMensagem->user_send->username }}<br />
            <b>Ficheiro ou SMS:</b> <br /><a href="{{ asset($getMensagem->sms) }}">{{ $getMensagem->sms }}</a><br />

        </div>
        <div class="col-md-4">

        </div>
    </div>

@endsection
