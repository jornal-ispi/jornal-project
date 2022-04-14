<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JORNAL ISPI</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap5/css/bootstrap.css') }}" />
</head>

<body>
    <div class="container">
        @if ($type != 'login')
            <div class="menu">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">Okuya Adventure</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <div class="navbar-nav">
                                <a class="nav-link @if ($menu=='Home' ) active @endif" aria-current="page" href="/admin/">Home</a>
                                <a class="nav-link @if ($menu=='Locais Turísticos' ) active @endif" href="/admin/locais/">Locais Turísticos</a>
                                <a class="nav-link @if ($menu=='Marcações' ) active @endif" href="/admin/marcacoes/">Marcações</a>
                                <a class="nav-link @if ($menu=='Reservas' ) active @endif" href="/admin/reservas/">Reservas</a>
                                <a class="nav-link @if ($menu=='Subscritos' ) active @endif" href="/admin/subscritos/">Subscritos</a>
                                <a class="nav-link @if ($menu=='Líderes' ) active @endif" href="/admin/liders/">Líderes de Viagens</a>
                                <a class="nav-link @if ($menu=='Província Tour' ) active @endif" href="/admin/provincia_tour/">Provincia
                                    Tour</a>
                                <!--<a class="nav-link @if ($menu == 'Blog') active @endif" href="/admin/blogs/">Blog</a>-->
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
