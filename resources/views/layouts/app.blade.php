<!doctype html>
<html lang="pt-BR">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Diário Digital</title>

		<link href="./simulor/admin/dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="./simulor/admin/dist/css/app.css" rel="stylesheet">
		<link href="./simulor/admin/dist/css/icons.min.css" rel="stylesheet">
		<link href="./css/style.css" rel="stylesheet">
		<link href="./css/front.css" rel="stylesheet">
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />

		<script src="./simulor/admin/dist/js/vendor.min.js"></script>
		<script src="./simulor/admin/dist/js/app.min.js"></script>
		
		<script src="./js/jquery-1.8.2.js"></script>
		<script src="./js/jquery-ui.js"></script>
		<script src="./js/custom.js"></script>

	</head>

	<body class="bg-light">
			@include('partials.header')

		@yield('content')
		@include('partials.footer')

	</body>
</html>
