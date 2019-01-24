<!doctype html>
<html lang="pt-BR">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Diário Digital</title>
		<link href="/css/bootstrap.min.css" rel="stylesheet">
		<link href="/css/style.css" rel="stylesheet">
		<link href="/simulor/admin/dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="/simulor/admin/dist/css/app.css" rel="stylesheet">
		<link href="/simulor/admin/dist/css/icons.min.css" rel="stylesheet">
	</head>

	<body>
		@include('partials.header')

		<main class="wrapper">
			<div class="container-fluid">
				@yield('content')
			</div>
		</main>

		<script src="/simulor/admin/dist/js/vendor.min.js"></script>
		<script src="/simulor/admin/dist/js/app.min.js"></script>
	</body>
</html>
