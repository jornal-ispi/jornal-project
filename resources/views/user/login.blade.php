@extends('layouts.app')
@section('content')
    <div class="form_login">
        <div class="row">
            <div class="col-md-12" style="float:center; text-align:center;">
                <h1>JORNAL ISPI</h1>
            </div>
        </div>


        @if (session('error'))
            <div class="alert bg-danger" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>
                {{ __(session('error')) }}
                <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a>
            </div>
        @endif

        @if (session('success'))
            <div class="alert bg-success" role="alert"><em class="fa fa-lg fa-check">&nbsp;</em> {{ session('success') }}
                <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a>
            </div>
        @endif
        {{ Form::open(['method' => 'post', 'name' => 'formLogin', 'url' => '/user/logar']) }}

        <fieldset>
            <legend>Iniciar Sessão</legend>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <input class="form-control" placeholder="{{ __('Nome de Usuário') }}" name="username" type="username"
                            autofocus="">
                        @if ($errors->has('username'))
                            <span class="text-danger">{{ $errors->first('username') }}</span>
                        @endif
                    </div>
                </div>

                <div class="col-md-12">
                    <br />
                    <div class="form-group">
                        <input class="form-control" placeholder="{{ __('Palavra-Passe') }}" name="password"
                            type="password" value="">
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="checkbox">
                        <label>
                            <input name="remember" type="checkbox" value="Remember Me"> {{ __('Lembrar Me') }}
                        </label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Entrar') }}
                    </button>
                </div>
            </div>

            {{ Form::close() }}
        </fieldset>
        <a href="/">Voltar</a>
    </div>
@endsection
