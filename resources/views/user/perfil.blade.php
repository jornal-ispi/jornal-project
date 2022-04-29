@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h4>{{ $menu }}</h4>
        </div>
        <div class="col-md-8">
            Nome de Usuário: {{ $getUser->username }}
            Código: {{ $getUser->code }}
            Estado: {{ $getUser->estado }}
        </div>
        <div class="col-md-4">

        </div>
    </div>

@endsection
