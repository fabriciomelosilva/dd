
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width" />
		<title>Diário Digital</title>

		<link rel="shortcut icon" type="image/ico" href="{{ asset('/assets/images/favicon.ico') }}"/>

		<link rel="stylesheet" href="./css/bootstrap.min.css">
		<link rel="stylesheet" href="./css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="./css/style.css">
		<script src="./js/jquery.min.js"></script>
		<script src="./js/bootstrap.min.js"></script>
		<link href="./simulor/admin/dist/css/icons.min.css" rel="stylesheet">

	</head>

	<body>

		<nav class="navbar navbar-primary navbar-static-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>

					<a class="navbar-brand" href="#">
						<img src="{{ asset('/assets/images/diario-logo.svg') }}" alt="Marca">
					</a>
				</div>

				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li><a type="button" class="btn btn-default navbar-btn" href="{{ url('/logoutAssinante') }}">Sair</a></li>
					</ul>
				</div>
			</div>
		</nav>


		
	</body>
</html>
