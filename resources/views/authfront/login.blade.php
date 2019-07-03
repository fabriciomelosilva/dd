@extends('layouts.app')
@section('content')

<div class="content-all content-all--mobile">
	<div class="experimente-content-right login-content-left login-content-left--mobile">
		<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
		  <ol class="carousel-indicators">
		    <li data-target="#carouselExampleFade" data-slide-to="0" class="active"></li>
		    <li data-target="#carouselExampleFade" data-slide-to="1"></li>
		    <li data-target="#carouselExampleFade" data-slide-to="2"></li>
		  </ol>
		  <div class="carousel-inner">
		    <div class="carousel-item carousel-item__bg carousel-item__bg--1 login__carousel-item--bg active">
		      	<div class="carousel-item__experimente--vertical-align">
			      	<div class="carousel-item__caption">
			      		<img src="{{ asset('/assets/images/icon-clube-assinante.png') }}">
			      		<h2 class="carousel-item__caption--title">Clube do assinante</h2>
				    	<p class="carousel-item__caption--descriprion">
				    		Promoções, descontos em serviços e produtos na rede de conveniados e vantagens exclusivas.
				    	</p>
			  		</div>
		  		</div>
		    </div>
		    <div class="carousel-item carousel-item__bg carousel-item__bg--2 login__carousel-item--bg">
		      	<div class="carousel-item__experimente--vertical-align">
			      	<div class="carousel-item__caption">
			      		<img src="{{ asset('/assets/images/icon-smartphone.png') }}">
			      		<h2 class="carousel-item__caption--title">Acesso total</h2>
				    	<p class="carousel-item__caption--descriprion">
				    		Tenha acesso ao acervo completo do jornal em qualquer dispositivo móvel.
				    	</p>
			  		</div>
		  		</div>
		    </div>
		    <div class="carousel-item carousel-item__bg carousel-item__bg--3 login__carousel-item--bg">
		      	<div class="carousel-item__experimente--vertical-align">
			      	<div class="carousel-item__caption">
			      		<img src="{{ asset('/assets/images/icon-acervo.png') }}">
			      		<h2 class="carousel-item__caption--title">Entrega especial</h2>
				    	<p class="carousel-item__caption--descriprion">
				    		Receba aonde você quiser, na sua casa ou no trabalho, ou nos dois endereços, um de segunda a sexta e outro no sábado.
				    	</p>
			  		</div>
		  		</div>
		    </div>
		  </div>
		</div>
	</div>

	<div class="experimente-content-left login-content-right login-content-right--mobile">
		<div class="experimente-content-left__login login__line-height">
			<a href="{{ url('/')}}" class="login__back">
				← Novo por aqui? Assine grátis por 15 dias
			</a>
		</div>

		<div class="experimente-content-left__experimente login-content-left__experimente">
			<div class="experimente-content-left__experimente--vertical-align login-content-left__experimente--vertical-align">
				<h1 class="experimente-content-left__title">
					Acesso do assinante
				</h1>
				@if (session()->has('flash.message'))
				<div class="alert alert-danger" role="alert">
					{{ session('flash.message') }}
					</div>
				@endif
				<form method="post" action="{{ route('loginAssinante') }}">
    				{{ csrf_field() }}
					<div class="form-group">
						<label for="cpf" class="login__label">Digite o CPF ou CNPJ do assinante</label>
						<input type="number" name="cpf" class="form-control login__form" value="{{ old('cpf') }}" id="cpf" placeholder="Utilize somente números" required>
					</div>
					<button type="submit" class="experimente-content-left__btn login__btnlogin">Acessar</button>
				</form>
			</div>
			<div class="experimente-content-left__footer login-content-left__footer">
				Dúvidas? Deseja assinar o Diário Digital? Entre em contato com nossa Central de Atendimento <span class="experimente-content-left__footer--orange">(85) 3266-9191</span>
			</div>
		</div>
	</div>

</div>

@endsection