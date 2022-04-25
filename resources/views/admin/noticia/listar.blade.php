@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h4>{{ $menu }}</h4>
            <span style="float: right; text-align:right;">
                <a href="/noticia/create" class="btn btn-success">
                    Nova</a>
            </span>
        </div>
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Imagem</th>
                            <th>Titulo</th>
                            <th>Estado</th>
                            <th>Operações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($getNoticias as $noticias)
                            <tr>
                                <td>
                                    <img src="{{ asset($noticias->img) }}" alt="" style="height: 56px; width:56px" />
                                </td>
                                <td>{{ $noticias->titulo }}</td>
                                <td>{{ $noticias->estado }}</td>
                                <td>
                                    <a href="/noticia/edit/{{ $noticias->id }}" class="btn btn-primary">Editar</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div class="paginate">
                {{ $getNoticias->links() }}
            </div>
        </div>
    </div>

@endsection
