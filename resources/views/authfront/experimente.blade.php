@extends('layouts.assinante')

@section('metatag')
<meta name="description" content="Acesse o Diário do Nordeste Digital inteiramente grátis por 15 dias.">
<meta name="robots" content="index, follow">
<link rel="canonical" href="https://diariodigital.verdesmares.com.br/" />

<meta property="og:title" content="Diário do Nordeste Digital - Acesse por 15 dias grátis">
<meta property="og:site_name" content="Diário do Nordeste">
<meta property="og:url" content="https://diariodigital.verdesmares.com.br/">
<meta property="og:description" content="Acesse o Diário do Nordeste Digital inteiramente grátis por 15 dias.">
<meta property="og:locale" content="pt_BR" />
<meta property="og:type" content="website">
<meta property="og:image" content="https://diariodigital.verdesmares.com.br/assets/images/diario-logo.svg">

<script type='application/ld+json'>
{
  "@context": "http://www.schema.org",
  "@type": "Organization",
  "name": "Diário Digital",
  "logo": "https://diariodigital.verdesmares.com.br/assets/images/diario-logo.svg",
  "sameAs": [
    "https://www.facebook.com/diariodonordeste/",
    "https://twitter.com/diarioonline",
    "https://www.instagram.com/diariodonordeste/",
    "https://www.youtube.com/channel/UCMf_wuiFqxdhZI1GVx02mmw"
  ]
  "description": "Acesse o Diário do Nordeste Digital inteiramente grátis por 15 dias.",
  "address": {
     "@type": "PostalAddress",
     "addressLocality": "Fortaleza",
     "addressRegion": "Ceará",
     "addressCountry": "Brasil"
  }
}
</script>
@endsection

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
					Acesse o Diário Digital Inteiramente Grátis por 15 dias
				</h1>
				<p class="experimente-content-left__text">
					Todo o conteúdo do Diário do Nordeste agora é exclusividade de nossos assinantes, a qualquer hora, em qualquer lugar, no computador, celular ou tablet.
				</p>
				<a href="http://centraldoassinante.diariodonordeste.com.br/assinar/experimente-15-dias/7" target="_blank" class="experimente-content-left__btn">
					Experimente grátis
				</a>
			</div>
			<div class="experimente-content-left__footer">
				Dúvidas? Deseja assinar o Diário Digital? Entre em contato com nossa Central de Atendimento <a href="tel:+558532669191">(85) 3266-9191</a>
			</div>
		</div>
	</div>

	<div class="experimente-content-right">
		<div id="carouselArguments" class="carousel slide carousel-fade" data-ride="carousel">
		  <ol class="carousel-indicators">
		    <li data-target="#carouselArguments" data-slide-to="0" class="active"></li>
		    <li data-target="#carouselArguments" data-slide-to="1"></li>
		    <li data-target="#carouselArguments" data-slide-to="2"></li>
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