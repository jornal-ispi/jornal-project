@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h4>{{ $menu }}</h4>
            <span style="float: right; text-align:right;">
                <a href="/chat/list" class="btn btn-warning">
                    Listar</a>
            </span>
        </div>
        <div class="col-md-12">
            @if (session('error'))
                <div class="alert bg-danger" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>
                    {{ __(session('error')) }}
                    <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a>
                </div>
            @endif

            @if (session('success'))
                <div class="alert bg-success" role="alert"><em class="fa fa-lg fa-check">&nbsp;</em>
                    {{ session('success') }}
                    <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a>
                </div>
            @endif
        </div>
        <div class="col-md-12">
            {{ Form::open(['method' => 'post', 'name' => 'formLogin', 'url' => '/chat/store', 'enctype' => 'multipart/form-data']) }}
            <fieldset>
                <legend>Dados</legend>
                <div class="row">

                    <div class="col-md-4">
                        <textarea name="sms" cols="30" rows="10" placeholder="Mensagem" class="form-control"></textarea>
                        @if ($errors->has('sms'))
                            <span class="text-danger">{{ $errors->first('sms') }}</span>
                        @endif
                    </div>

                    <hr />
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </div>
            </fieldset>
            {{ Form::close() }}
        </div>
    </div>

@endsection
