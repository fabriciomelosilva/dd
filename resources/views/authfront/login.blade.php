<?php
/*

@extends('layouts.app')
@section('content')

<div class="loginside">
	<div id="vertical">
		<div class="contentlogin">
			<img src="{{ asset('/assets/images/logo-diario-do-nordeste-dd.svg') }}">
			<h2>Direto. Claro. Simples.</h2>
			<p>
				Acessar todo o conteúdo do Diário do Nordeste agora é exclusividade de nossos assinantes, a qualquer hora, em qualquer lugar, no computador, celular ou tablet.
			</p>
			@if (session()->has('flash.message'))
				<div class="alert alert-danger" role="alert">
					{{ session('flash.message') }}
				</div>
			@endif
			<form method="post" action="{{ route('loginAssinante') }}">
				{{csrf_field()}}
				<div class="form-group">
					<label for="cpf" class="text-uppercase">ACESSO DO ASSINANTE</label>
					<input type="text" name="cpf" class="form-control" value="{{ old('cpf') }}" id="cpf" placeholder="DIGITE O CPF OU CNPJ DO ASSINANTE" required>
				</div>

				<button type="submit" class="btn">Acessar</button>
			</form>
		</div>
	</div>
</div>

<div class="loginright">
	<div id="vertical">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h2>Não é assinante ainda?</h2>	
					<p class="description">
						Veja algumas das vantagens de ser assinante do jornal impresso + digital
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-sm-4">
					<div class="argument">
						<img src="{{ asset('/assets/images/cellphone-circle-icon.png') }}">
						<h3>Acesso<br />Total</h3>
						<p>Tenha acesso ao acervo completo do jornal em qualquer dispositivo móvel.</p>
					</div>
				</div>
				<div class="col-12 col-sm-4">
					<div class="argument">
						<img src="{{ asset('/assets/images/discount-circle-icon.png') }}">
						<h3>Entrega<br />especial</h3>
						<p>Receba aonde você quiser ou em dois endereços, um de segunda a sexta e outro no fim de semana.</p>
					</div>
				</div>
				<div class="col-12 col-sm-4">
					<div class="argument">
						<img src="{{ asset('/assets/images/journal-circle-icon.png') }}">
						<h3>Clube do<br />assinante</h3>
						<p> Promoções, descontos em serviços e produtos na rede de conveniados e vantagens exclusivas.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<a href="http://centraldoassinante.diariodonordeste.com.br/assinar/experimente-15-dias/7" target="_blank">
						<div class="btndegustacao">
							Experimente grátis por 15 dias
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="loginfooter">
	@endsection
</div>
*/?>

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
			<div class="col-md-6 cardlogin-assinante cardlogin-assinante">
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
		<p class="lead">
			Vantagens de ser assinante impresso + digital
			<br />
			<a href="http://centraldoassinante.diariodonordeste.com.br/assinar/experimente-15-dias/7" target="_blank">Experimente grátis por 15 dias</a>
			<br /><br />
		</p>

		<div class="row">
			<div class="col-lg-4 col-sm-6">
				<div class="card text-center hover-shadow-lg hover-translate-y-n10">
				<div class="px-4 py-5">
					<img src="{{ asset('/assets/images/discount-circle-icon.png') }}">
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
					<img src="{{ asset('/assets/images/cellphone-circle-icon.png') }}">
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
					<img src="{{ asset('/assets/images/journal-circle-icon.png') }}">
				</div>
				<div class="px-4 pb-5">	
					<h5>Vantagens</h5>
					<p class="text-muted">Vantagens do Clube do Assinante.<br /><br /></p>
				</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection