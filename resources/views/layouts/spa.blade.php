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
        <div id="page-wrapper" class="gray-bg">
			@include('partials.nav-painel')

			<div class="row wrapper border-bottom white-bg page-heading">
				@yield('breadcrumb')
			</div>

		   <div class="wrapper wrapper-content  animated fadeInRight">
				<div class="row">
					<div class="col-sm-12">
						<div class="ibox float-e-margins">
							<div class="ibox-title">
								@yield('h5-title')
								<div class="ibox-tools">
									<a class="collapse-link">
										<i class="fa fa-chevron-up"></i>
									</a>
									<a class="close-link">
										<i class="fa fa-times"></i>
									</a>
								</div>
							</div>
							<div id="app" class="ibox-content">
								@include('partials.message')                       
								<div class="row">
									<div class="col-md-12">
										<app></app>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

            @include('partials.footer-painel')
        </div>
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
