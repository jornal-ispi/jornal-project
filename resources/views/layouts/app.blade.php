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
                        <a class="navbar-brand" href="#">jornal ISPI Administrador</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <div class="navbar-nav">
                                <a class="nav-link @if ($menu=='Home' ) active @endif" aria-current="page" href="/">Home</a>
                                <a class="nav-link @if ($menu=='Usuários' ) active @endif" aria-current="page" href="/usuario/list">Usuários</a>
                                <a class="nav-link @if ($menu=='Notícia' ) active @endif" aria-current="page" href="/noticia/list">Notícia</a>
                                <a class="nav-link @if ($menu=='Chat' ) active @endif" aria-current="page" href="/chat/list">Chat</a>
                                <a class="nav-link @if ($menu=='Portefólio' ) active @endif" aria-current="page"
                                    href="/portefolio">Portefólio</a>
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

        <div class="rodape">

        </div>
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
