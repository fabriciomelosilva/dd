@extends('layouts.app')

@section('content')

<section class="jumbotron">
	<div class="container">
		<!-- navbar -->
		<nav class="navbar navbar-main navbar-expand-lg navbar-transparent p-0 mb-4" id="navbar-main">
			<div class="container px-lg-0">
				<a class="navbar-brand mr-lg-5" href="index.html">
					<img alt="Image placeholder" src="{{ asset('/assets/images/diario-logo-light.svg') }}" id="navbar-logo" style="height: 50px;">
				</a>
			</div>
		</nav>
		<!-- /navbar -->

		<div class="row">
			<div class="col-md-6">
				<h1 class="jumbotron-heading text-white">Direto. Claro. Simples</h1>
				<p class="lead text-white">Acessar todo o conteúdo do Diário do Nordeste agora é exclusividade de nossos assinantes, a qualquer hora, em qualquer lugar, no computador, celular ou tablet.</p>
			</div>

			<div class="col-md-6">
				<div class="card shadow bg-white rounded p-lg-4">
					<div class="bg-white border-0 card-header">
						<p class="font-weight-bold m-0 text-uppercase">Acesso do assinante</p>
					</div>
					<div class="card-body">
						@if (session()->has('flash.message'))
						<div class="alert alert-danger" role="alert">
							{{ session('flash.message') }}
							</div>
						@endif
						<form method="post" action="{{ route('loginAssinante') }}">
            				{{csrf_field()}}
							<div class="form-group">
								<label for="" class="text-uppercase">Digite o CPF ou CNPJ do assinante</label>
								<input type="text" name="cpf" class="form-control" value="{{ old('cpf') }}" id="cpf" placeholder="000.000.000-00" required>
							</div>

							<div class="mt-4">
								<button type="submit" class="btn btn-primary">Acessar</button>
								<a href="http://centraldoassinante.diariodonordeste.com.br/assinar/experimente-15-dias/7" target="_blank" class="btn btn-link">Degustação</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
	<div class="container">
		<h1 class="display-5"><a href="http://centraldoassinante.diariodonordeste.com.br/assinar" target="_blank">Quero Assinar</a></h1>
		<p class="lead">Vantagens de ser assinante impresso + digital</p>

		<div class="row">
			<div class="col-lg-4 col-sm-6">
				<div class="card text-center hover-shadow-lg hover-translate-y-n10">
				<div class="px-4 py-5">
				</div>
				<div class="px-4 pb-5">
					<h5>Comodidade</h5>
					<p class="text-muted">Comodidade de receber o jornal impresso</p>
				</div>
				</div>
			</div>
			
			<div class="col-lg-4 col-sm-6">
				<div class="card text-center hover-shadow-lg hover-translate-y-n10">
				<div class="px-4 py-5">
				</div>
				<div class="px-4 pb-5">
					<h5>Acervo</h5>
					<p class="text-muted">Acervo de cadernos especiais no computador ou tablet.</p>
				</div>
				</div>
			</div>

			<div class="col-lg-4 col-sm-6">
				<div class="card text-center hover-shadow-lg hover-translate-y-n10">
				<div class="px-4 py-5">
				</div>
				<div class="px-4 pb-5">
					<h5>Vantagens</h5>
					<p class="text-muted">Vantagens do Clube do Assinante.</p>
				</div>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection
