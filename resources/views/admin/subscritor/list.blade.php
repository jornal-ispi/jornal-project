@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h4>{{ $menu }}</h4>
            <span style="float: right; text-align:right;">
                <a href="/subscritores/send" class="btn btn-success">
                    Enviar</a>
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
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Usuário</th>
                            <th>Email</th>
                            <th>Estado</th>
                            <th>Operações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($getSubscritors as $subscritor)
                            <tr>

                                <td>{{ $subscritor->usuarios->username }}</td>
                                <td>{{ $subscritor->email }}</td>
                                <td>{{ $subscritor->estado }}</td>
                                <td></td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div class="paginate">
                {{ $getSubscritors->links() }}
            </div>
        </div>
    </div>

@endsection
