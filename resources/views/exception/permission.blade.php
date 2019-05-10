
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
		<nav class="navbar navbarassinante">
			<div class="container">
				<div class="navbar-header">
					
					<div class="navbar-logout">
						<a type="button" class="btn btn-pattern" href="{{ url('/logoutAssinante') }}">Sair</a></li>
					</div>

					<a class="navbar-brand" href="#">
						<img src="{{ asset('/assets/images/diario-logo.svg') }}" alt="Marca">
					</a>
				</div>
			</div>
		</nav>
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h1><span style="font-size: 5em">401</span>Acesso Negado!</h1>
					<h3>
						<a type="button" class="btn btn-pattern" href="{{ url('/logoutAssinante') }}">Retorne ao <strong>ACESSO DO ASSINANTE</strong></a></li>
					</h3>
				</div>
			</div>
		</div>
	</body>
</html>
