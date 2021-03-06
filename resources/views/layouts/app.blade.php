@php
use App\Http\Controllers\StaticController;
if (Auth::check()) {
    $id_user = Auth::user()->id;
    $getSMS = StaticController::getSMS($id_user);
}

@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap5/css/bootstrap.css') }}" />

</head>

<body>
    <div class="container">
        @if ($type != 'login')
            <div class="menu">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">jornal ISPI</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <div class="navbar-nav">
                                <a class="nav-link @if ($menu=='Home' ) active @endif" aria-current="page" href="/">Home</a>
                                @if (Auth::user()->acesso == 'admin')
                                    <a class="nav-link @if ($menu=='Usuários' ) active @endif" aria-current="page"
                                        href="/usuario/list">Usuários</a>
                                @endif
                                @if (Auth::user()->acesso != 'leitor')
                                    <a class="nav-link @if ($menu=='Notícias' ) active @endif" aria-current="page"
                                        href="/noticia/list">Notícias</a>
                                @endif
                                <a class="nav-link @if ($menu=='Chat' ) active @endif" aria-current="page" href="/chat/list">Chat
                                    ({{ $getSMS->count() }})</a>
                                @if (Auth::user()->acesso == 'admin')
                                    <a class="nav-link @if ($menu=='Subscritores' ) active @endif" aria-current="page"
                                        href="/subscritores/list">Subscritores</a>
                                @endif
                                <a class="nav-link @if ($menu=='Portefólio' ) active @endif" aria-current="page"
                                    href="/portefolio">Portefólio</a>
                                <a class="nav-link @if ($menu=='Perfil' ) active @endif" aria-current="page" href="/user/perfil">Perfil</a>
                                <a class="nav-link" href="/user/logout" tabindex="-1" aria-disabled="true">Logout</a>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        @endif


        <div class="content">
            @yield('content')
        </div>

        @if ($menu == 'Home')
            <div class="footer">
                <hr />
                <div class="row">
                    <div class="col-md-9">
                        <h2>Jornal ISPI</h2>
                    </div>
                    <div class="col-md-3">
                        <div class="row">

                            <div class="col-md-12">
                                @if (session('error'))
                                    <div class="alert bg-danger" role="alert"><em
                                            class="fa fa-lg fa-warning">&nbsp;</em>
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
                                {{ Form::open(['method' => 'post', 'url' => '/subscritores/subscribe']) }}
                                <input type="text" name="email" placeholder="Subscrever-se" class="form-control" />
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                                <button type="submit" class="btn btn-primary">Subscrever</button>
                                {{ Form::close() }}
                            </div>


                        </div>

                    </div>
                    <div class="col-md-12">

                    </div>
                </div>
            </div>
        @endif
    </div>


    <script src="{{ asset('assets/bootstrap5/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/bootstrap5/js/bootstrap.bundle.js') }}"></script>


    <script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Summernote

            $('.textarea').summernote({
                toolbar: [
                    ['basic', ['style', 'fontname', 'fontsize']],
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['forecolor', 'backcolor']],
                    ['block', ['ul', 'ol', 'paragraph']],
                    ['media', ['link', 'picture', 'video', 'table', 'hr']],
                    ['height', ['height', 'codeview', 'fullscreen', 'undo', 'redo']]
                ]
            });
        });

    </script>

</body>


</html>
