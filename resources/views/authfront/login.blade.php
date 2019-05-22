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
