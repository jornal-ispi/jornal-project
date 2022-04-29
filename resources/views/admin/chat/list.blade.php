@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h4>{{ $menu }}</h4>
            @if (Auth::user()->acesso == 'leitor')
                <span style="float: right; text-align:right;">
                    <a href="/chat/create" class="btn btn-success">
                        Enviar</a>
                </span>
            @endif
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
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Usuário</th>
                            <th>SMS</th>
                            <th>Estado</th>
                            <th>Operações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($getMensagens as $mensagens)
                            <tr>

                                <td>{{ $mensagens->user_send->username }}</td>
                                <td>{{ $mensagens->sms }}</td>
                                <td>{{ $mensagens->status_sms }}</td>
                                <td>
                                    <a href="/chat/show/{{ $mensagens->id }}" class="btn btn-warning">Visualizar</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div class="paginate">
                {{ $getMensagens->links() }}
            </div>
        </div>
    </div>

@endsection
