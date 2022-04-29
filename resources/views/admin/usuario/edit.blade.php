@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h4>{{ $menu }}</h4>
            <span style="float: right; text-align:right;">
                <a href="/usuario/list" class="btn btn-warning">
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
            {{ Form::open(['method' => 'put', 'name' => 'formLogin', 'url' => "/usuario/update/{$getUsuario->id}"]) }}
            <fieldset>
                <legend>Dados</legend>
                <div class="row">
                    <div class="col-md-4">
                        <input class="form-control" placeholder="{{ __('Nome de Usuário') }}" name="username"
                            type="username" autofocus="" value="{{ $getUsuario->username }}" />
                        @if ($errors->has('username'))
                            <span class="text-danger">{{ $errors->first('username') }}</span>
                        @endif
                    </div>
                    <div class="col-md-3">
                        <select name="acesso" class="form-control">
                            <option value="{{ $getUsuario->acesso }}" hidden>{{ $getUsuario->acesso }}</option>
                            <option value="admin">admin</option>
                            <option value="escritor">escritor</option>
                            <option value="editor">editor</option>
                            <option value="leitor">leitor</option>
                        </select>
                        @if ($errors->has('acesso'))
                            <span class="text-danger">{{ $errors->first('acesso') }}</span>
                        @endif
                    </div>

                    <div class="col-md-3">
                        <select name="estado" class="form-control">
                            <option value="{{ $getUsuario->estado }}" hidden>{{ $getUsuario->estado }}</option>
                            <option value="on">on</option>
                            <option value="off">off</option>
                        </select>
                        @if ($errors->has('estado'))
                            <span class="text-danger">{{ $errors->first('estado') }}</span>
                        @endif
                        <br />
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
