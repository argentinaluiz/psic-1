<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Marisa: MarGraphics">

    <title>{{$title or 'Psicanalysis | 404 Error'}}</title>

    <!-- Styles -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <link href="{{ asset('css/themeStyle.css') }}" rel="stylesheet">

    @stack('extra-css')

</head>

<body class="gray-bg">
    <div id="wrapper">
        <div class="middle-box text-center animated fadeInDown">
            <h1>403</h1>
            <h3 class="font-bold">Não autorizado</h3>

            <div class="error-desc">
                Sorry, mas você não têm autorização para acessar essa página.
                <form class="form-inline m-t" role="form">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search for page">
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Script -->
    <script src="{{ asset('js/admin.js') }} "></script>

    <!-- Plugins -->
    <script src="{{ asset('js/plugins.js') }} "></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ asset('js/atendimento.js') }} "></script>
    
    @stack('extra-js')

</body>

</html>
