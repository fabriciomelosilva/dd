@extends('layouts.app')
@section('content')

<div class="content-all">

	<div class="experimente-content-left">
		<div class="experimente-content-left__logo">
			<img class="img-responsive" src="{{ asset('/assets/images/diario-logo.svg') }}" height="50" />
		</div>

		<div class="experimente-content-left__login">
			<a href="{{ url('/loginAssinante')}}" class="experimente-content-left__login-btn">
				Entrar
			</a>
		</div>

		<div class="experimente-content-left__experimente">
			<div class="experimente-content-left__experimente--vertical-align">
				<h1 class="experimente-content-left__title">
					Acesse o Diário do Nordeste Inteiramente Grátis por 15 dias
				</h1>
				<p class="experimente-content-left__text">
					Todo o conteúdo do Diário do Nordeste agora é exclusividade de nossos assinantes, a qualquer hora, em qualquer lugar, no computador, celular ou tablet.
				</p>
				<a href="http://centraldoassinante.diariodonordeste.com.br/assinar/experimente-15-dias/7" target="_blank" class="experimente-content-left__btn">
					Experimente grátis
				</a>
			</div>
			<div class="experimente-content-left__footer">
				Dúvidas? Deseja assinar o Diário Digital? Entre em contato com nossa Central de Atendimento <span class="experimente-content-left__footer--orange">(85) 3266-9191</span>
			</div>
		</div>
	</div>

	<div class="experimente-content-right">
		<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
		  <ol class="carousel-indicators">
		    <li data-target="#carouselExampleFade" data-slide-to="0" class="active"></li>
		    <li data-target="#carouselExampleFade" data-slide-to="1"></li>
		    <li data-target="#carouselExampleFade" data-slide-to="2"></li>
		  </ol>
		  <div class="carousel-inner">
		    <div class="carousel-item carousel-item__bg carousel-item__bg--1 active">
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
		    <div class="carousel-item carousel-item__bg carousel-item__bg--2">
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
		    <div class="carousel-item carousel-item__bg carousel-item__bg--3">
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
</div>

@endsection