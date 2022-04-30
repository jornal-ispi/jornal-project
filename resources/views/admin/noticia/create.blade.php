@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h4>{{ $menu }}</h4>
            <span style="float: right; text-align:right;">
                <a href="/noticia/list" class="btn btn-warning">
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
            {{ Form::open(['method' => 'post', 'name' => 'formLogin', 'url' => '/noticia/store', 'enctype'=>"multipart/form-data"]) }}
            @csrf
            <fieldset>
                <legend>Dados</legend>
                <div class="row">
                    <div class="col-md-4">
                        <input class="form-control" placeholder="Título" name="titulo" type="text" autofocus="">
                        @if ($errors->has('titulo'))
                            <span class="text-danger">{{ $errors->first('titulo') }}</span>
                        @endif
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                           {{Form::label('img', 'Imagem')}} <span class="text-danger">*</span>
                           {{ Form::file('img', null, ['placeholder'=>"Imagem", 'class'=>"form-control"]) }}
                           @if($errors->has('img'))
                           <span class="text-danger">{{$errors->first('img')}}</span>
                           @endif
                        </div>
                    </div>

                    <div class="col-md-3">
                        <select name="estado" class="form-control">
                            <option value="" hidden>Estado</option>
                            <option value="on">on</option>
                            <option value="off">off</option>
                        </select>
                        @if ($errors->has('estado'))
                            <span class="text-danger">{{ $errors->first('estado') }}</span>
                        @endif
                    </div>

                    <div class="col-md-12">
                        <input class="form-control" placeholder="Rescalgo da Noticia" name="description_min" type="text" autofocus="">
                        @if ($errors->has('description_min'))
                            <span class="text-danger">{{ $errors->first('description_min') }}</span>
                        @endif
                    </div>
                    <div class="col-md-12">

                        {{ Form::label('descricao', 'Notícia Completa') }} <span class="text-danger">*</span>
                        {{ Form::textarea('descricao', null, ['class' => 'form-control textarea', 'style' => 'width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;', 'cols' => '100', 'rows' => '4', 'placeholder' => 'Notícia Completa']) }}
                        @if ($errors->has('descricao'))
                            <span class="text-danger">{{ $errors->first('descricao') }}</span>
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
