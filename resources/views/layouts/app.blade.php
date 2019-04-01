<!doctype html>
<html lang="pt-BR">
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Diário Digital</title>
        
        <link rel="shortcut icon" type="image/ico" href="./images/favicon.ico"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="{{ asset('/simulor/admin/dist/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/simulor/admin/dist/css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('/simulor/admin/dist/css/icons.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/front.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />

        <script src="{{ asset('/simulor/admin/dist/js/vendor.min.js') }}"></script>
        <script src="{{ asset('/simulor/admin/dist/js/app.min.js') }}"></script>            
        <script src="{{ asset('/js/jquery-1.8.2.js') }}"></script>
        <script src="{{ asset('/js/jquery-ui.js') }}"></script>
        <script src="{{ asset('/js/custom.js') }}"></script>

	</head>

	<body class="bg-light">
			@include('partials.header')

		@yield('content')
		@include('partials.footer')

	</body>
</html>
