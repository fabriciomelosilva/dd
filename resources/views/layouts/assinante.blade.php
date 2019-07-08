<!doctype html>
<html lang="pt-BR">
	<head>

		@include('partials.headertagmanager')

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Diário Digital</title>

		<link rel="shortcut icon" type="image/ico" href="{{ asset('/images/favicon.ico') }}"/>
		<link href="./css/front.css" rel="stylesheet">
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		



		<link href="{{ asset('/css/style.css')}}?v=v1.0.3" rel="stylesheet">




		<script src="{{ asset('/js/jquery.min.js')}}"></script>
		<script src="{{ asset('/js/jquery-ui.js')}}"></script>
		<script src="{{ asset('/js/bootstrap.min.js')}}"></script>


	</head>

	<body class="bg-light">

		@include('partials.bodytagmanager')

		@include('partials.header')

		@yield('content')

		@include('partials.footer')
	</body>
</html>