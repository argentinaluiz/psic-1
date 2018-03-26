<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Psicanalysis - @yield('pag_title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/spa.css') }}" rel="stylesheet">
	<link href="{{ asset('css/themeStyle.css') }}" rel="stylesheet">

	@stack('extra-css')

</head>
<body>
    <div id="wrapper">
		<app></app>
    </div>
	<!-- Script -->
	<script src="{{ asset('js/spa.js') }} "></script>

    <!-- Plugins -->
    <script src="{{ asset('js/plugins.js') }} "></script>

    <!-- Custom and plugin javascript -->
   	<script src="{{ asset('js/atendimento.js') }} "></script>
	
   	@stack('extra-js')
</body>
</html>
