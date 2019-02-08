<!doctype html>
<html lang="pt-BR">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Diário Digital</title>

		<link href="/simulor/admin/dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="/simulor/admin/dist/css/app.css" rel="stylesheet">
		<link href="/simulor/admin/dist/css/icons.min.css" rel="stylesheet">

		<script src="/simulor/admin/dist/js/vendor.min.js"></script>
		<script src="/simulor/admin/dist/js/app.min.js"></script>

		<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
		<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
		<script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>

		<script src="/js/custom.js"></script>

	</head>

	<body>
		@include('partials.header')

		<main class="wrapper">
			<div class="container-fluid">
				@yield('content')
			</div>
		</main>
	</body>
</html>
