@extends('layouts.assinante')

@section('metatag')
<meta name="description" content="Acesso do assinante ao Diário do Nordeste Digital. Entre com o CPF ou CNPJ do assinante.">
<meta name="robots" content="index, follow">
<link rel="canonical" href="http://diariodigital.verdesmares.com.br/public/loginAssinante" />

<meta property="og:title" content="Diário do Nordeste Digital -Login do assinante">
<meta property="og:site_name" content="Diário do Nordeste">
<meta property="og:url" content="http://diariodigital.verdesmares.com.br/public/loginAssinante/">
<meta property="og:description" content="Acesso do assinante ao Diário do Nordeste - Digital. Entre com o CPF ou CNPJ do assinante.">
<meta property="og:locale" content="pt_BR" />
<meta property="og:type" content="website">
<meta property="og:image" content="http://diariodigital.verdesmares.com.br/public/assets/images/diario-logo.svg">

<script type='application/ld+json'>
{
  "@context": "http://www.schema.org",
  "@type": "Organization",
  "name": "Diário Digital",
  "logo": "http://diariodigital.verdesmares.com.br/public/assets/images/diario-logo.svg",
  "sameAs": [
    "https://www.facebook.com/diariodonordeste/",
    "https://twitter.com/diarioonline",
    "https://www.instagram.com/diariodonordeste/",
    "https://www.youtube.com/channel/UCMf_wuiFqxdhZI1GVx02mmw"
  ]
  "description": "Acesso do assinante ao Diário do Nordeste Digital. Entre com o CPF ou CNPJ do assinante.",
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

<div class="content-all content-all--mobile">
	<div class="experimente-content-right login-content-left login-content-left--mobile">
		<div class="logo-slider">
		<a href="{{ url('/')}}">
			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="206" height="40" viewBox="0 0 206 40">
			  <defs>
			    <polygon id="logo-a" points=".007 .204 6.943 .204 6.943 7.777 .007 7.777"/>
			    <polygon id="logo-c" points="0 39.959 205.286 39.959 205.286 0 0 0"/>
			    <polygon id="logo-e" points="0 39.959 205.286 39.959 205.286 0 0 0"/>
			    <polygon id="logo-g" points="0 39.959 205.286 39.959 205.286 0 0 0"/>
			    <polygon id="logo-i" points="0 39.959 205.286 39.959 205.286 0 0 0"/>
			    <polygon id="logo-k" points="0 39.959 205.286 39.959 205.286 0 0 0"/>
			    <polygon id="logo-m" points="0 39.959 205.286 39.959 205.286 0 0 0"/>
			  </defs>
			  <g fill="none" fill-rule="evenodd">
			    <g fill="#fff" fill-rule="nonzero" transform="translate(133 29)">
			      <path d="M7.898343,10.3094675 L7.898343,0.4846154 L5.807219,0.4846154 L5.807219,3.7821302 L5.770059,3.7821302 C5.361775,3.2810651 4.748994,2.8789349 3.678935,2.8789349 C1.841302,2.8789349 0.727929,4.4133728 0.727929,6.6652071 C0.727929,8.9298225 1.859763,10.4640237 3.715858,10.4640237 C4.848402,10.4640237 5.466864,10.0001183 5.813136,9.5485207 L5.856686,9.5485207 L5.856686,10.3094675 L7.898343,10.3094675 Z M5.93716,6.6467456 C5.93716,8.007929 5.324379,8.7814201 4.415266,8.7814201 C3.412663,8.7814201 2.837278,8.1007101 2.837278,6.6467456 C2.837278,5.2673373 3.412663,4.5740828 4.415266,4.5740828 C5.324379,4.5740828 5.93716,5.3660355 5.93716,6.6467456 Z M15.550556,6.6900828 C15.550556,4.1906746 14.009964,2.8789586 11.949846,2.8789586 C9.889491,2.8789586 8.336592,4.1906746 8.336592,6.6900828 C8.336592,9.1587219 9.889491,10.464284 11.949846,10.464284 C14.009964,10.464284 15.550556,9.1587219 15.550556,6.6900828 Z M13.521207,6.6900828 C13.521207,8.1873609 12.859432,8.7752899 11.961917,8.7752899 C11.064876,8.7752899 10.396947,8.1935148 10.396947,6.6900828 C10.396947,5.155645 11.064876,4.5617988 11.961917,4.5617988 C12.859432,4.5617988 13.521207,5.1620355 13.521207,6.6900828 Z"/>
			      <polygon points="17.778 10.309 19.931 10.309 19.931 3.664 20.006 3.664 24.169 10.309 26.471 10.309 26.471 .485 24.318 .485 24.318 7.16 24.256 7.16 20.049 .485 17.778 .485"/>
			      <path d="M34.177515,6.6900828 C34.177515,4.1906746 32.636923,2.8789586 30.576805,2.8789586 C28.51645,2.8789586 26.96355,4.1906746 26.96355,6.6900828 C26.96355,9.1587219 28.51645,10.464284 30.576805,10.464284 C32.636923,10.464284 34.177515,9.1587219 34.177515,6.6900828 Z M32.148166,6.6900828 C32.148166,8.1873609 31.486391,8.7752899 30.588876,8.7752899 C29.691834,8.7752899 29.023905,8.1935148 29.023905,6.6900828 C29.023905,5.155645 29.691834,4.5617988 30.588876,4.5617988 C31.486391,4.5617988 32.148166,5.1620355 32.148166,6.6900828 Z M34.648166,10.3094675 L36.733373,10.3094675 L36.733373,7.5873373 C36.733373,5.6756213 37.283669,4.8401183 39.121302,4.6855621 L39.121302,2.8789349 C37.908757,2.8789349 37.098107,3.2872189 36.702367,4.3328994 L36.66497,4.3328994 L36.66497,3.0211834 L34.648166,3.0211834 L34.648166,10.3094675 Z M46.292426,10.3094675 L46.292426,0.4846154 L44.201302,0.4846154 L44.201302,3.7821302 L44.164142,3.7821302 C43.755858,3.2810651 43.143077,2.8789349 42.073018,2.8789349 C40.235385,2.8789349 39.121775,4.4133728 39.121775,6.6652071 C39.121775,8.9298225 40.253846,10.4640237 42.109941,10.4640237 C43.242249,10.4640237 43.860947,10.0001183 44.207219,9.5485207 L44.250769,9.5485207 L44.250769,10.3094675 L46.292426,10.3094675 Z M44.331243,6.6467456 C44.331243,8.007929 43.718462,8.7814201 42.809349,8.7814201 C41.806746,8.7814201 41.231361,8.1007101 41.231361,6.6467456 C41.231361,5.2673373 41.806746,4.5740828 42.809349,4.5740828 C43.718462,4.5740828 44.331243,5.3660355 44.331243,6.6467456 Z M53.777988,6.411716 C53.777988,4.2029586 52.373491,2.8789349 50.393846,2.8789349 C48.271716,2.8789349 46.842367,4.3513609 46.842367,6.7149112 C46.842367,9.2330178 48.469349,10.451716 50.666036,10.451716 C51.748639,10.451716 52.837396,10.1669822 53.746982,8.9608284 L52.367574,7.9151479 C52.014911,8.5089941 51.340355,8.8306509 50.697041,8.8306509 C49.700592,8.8306509 48.970651,8.1627219 48.946036,7.160355 L53.710059,7.160355 C53.771834,6.7643787 53.777988,6.6344379 53.777988,6.411716 Z M51.730178,5.6323077 L48.983195,5.6323077 C49.08213,4.9823669 49.459408,4.4256805 50.36284,4.4256805 C51.191953,4.4256805 51.63716,4.8959763 51.730178,5.6323077 Z M57.227811,10.4579645 C59.282012,10.4579645 60.358225,9.5980828 60.358225,8.100568 C60.358225,6.5540592 59.244615,6.0837633 58.260947,5.811574 L57.054556,5.4835266 C56.615266,5.3658935 56.373846,5.2177278 56.373846,4.9019882 C56.373846,4.5062485 56.732899,4.2771361 57.270888,4.2771361 C57.920828,4.2771361 58.669231,4.5928757 59.313018,5.2361893 L60.240828,3.9616331 C59.517041,3.367787 58.607219,2.8790296 57.283432,2.8790296 C55.569822,2.8790296 54.388047,3.6153609 54.388047,5.1434083 C54.388047,6.3497988 55.136686,6.9313373 56.417396,7.2716923 L57.314438,7.5067219 C57.94568,7.6738225 58.267337,7.8163077 58.267337,8.2245917 C58.267337,8.7318107 57.803195,8.9606864 57.233964,8.9606864 C56.392781,8.9606864 55.538817,8.4903905 54.981893,7.8903905 L53.985917,9.3197396 C54.90142,10.0558343 56.120592,10.4579645 57.227811,10.4579645 Z M63.503195,10.3094675 L65.136568,10.3094675 L65.136568,8.6884024 L64.412781,8.6884024 C63.787929,8.6884024 63.614675,8.4905325 63.614675,7.7544379 L63.614675,4.2647337 L65.136568,4.2647337 L65.136568,3.0211834 L63.614675,3.0211834 L63.614675,0.4846154 L61.535621,0.4846154 L61.535621,3.0211834 L60.551953,3.0211834 L60.551953,4.2647337 L61.535621,4.2647337 L61.535621,8.1750296 C61.535621,9.6226036 62.148402,10.3094675 63.503195,10.3094675 Z"/>
			    </g>
			    <g transform="translate(198.343 31.675)">
			      <mask id="logo-b" fill="#fff">
			        <use xlink:href="#logo-a"/>
			      </mask>
			      <path fill="#fff" fill-rule="nonzero" d="M6.94274556,3.73668639 C6.94274556,1.52792899 5.53824852,0.20390533 3.55860355,0.20390533 C1.43647337,0.20390533 0.00712426,1.67633136 0.00712426,4.03988166 C0.00712426,6.55798817 1.63410651,7.77668639 3.8307929,7.77668639 C4.91339645,7.77668639 6.00215385,7.49195266 6.91173964,6.28579882 L5.53233136,5.24011834 C5.17966864,5.8339645 4.50511243,6.1556213 3.86179882,6.1556213 C2.86534911,6.1556213 2.13540828,5.48769231 2.1107929,4.48532544 L6.87457988,4.48532544 C6.93659172,4.08934911 6.94274556,3.95940828 6.94274556,3.73668639 M4.89493491,2.95727811 L2.14795266,2.95727811 C2.24688757,2.30733728 2.62416568,1.75065089 3.52759763,1.75065089 C4.35671006,1.75065089 4.80191716,2.22094675 4.89493491,2.95727811" mask="url(#logo-b)"/>
			    </g>
			    <path fill="#fff" fill-rule="nonzero" d="M34.8553846,19.8186036 C34.8553846,7.40747929 28.9595266,0.0003787 15.1112426,0.0003787 L0,0.0003787 L0,39.3395503 L15.0617751,39.3395503 C28.6620118,39.3395503 34.8553846,32.2545799 34.8553846,19.8186036 Z M26.3086391,19.5707929 C26.3086391,27.5724497 23.1375148,31.9573018 14.3928994,31.9573018 L8.6208284,31.9573018 L8.6208284,7.35777515 L15.0123077,7.35777515 C23.3855621,7.35777515 26.3086391,11.8415621 26.3086391,19.5707929 Z M72.3952189,39.3396923 L72.3952189,19.6452544 C72.3952189,12.956497 67.7874083,9.58750296 60.6032663,9.58750296 C56.020071,9.58750296 51.3381775,10.9993373 47.3003077,14.2696331 L50.8674083,19.7938935 C53.2953373,17.5146036 57.035929,15.8301065 60.3554556,15.8301065 C63.1798343,15.8301065 64.9140355,17.0935385 65.0375858,19.4469112 L57.035929,21.7262012 C51.140071,23.3858462 46.7552189,26.1356686 46.7552189,31.7839527 C46.7552189,36.9368521 50.2977041,39.9588639 55.7973491,39.9588639 C58.5225562,39.9588639 61.544568,39.1415858 65.0375858,36.3172071 L65.0375858,39.3396923 L72.3952189,39.3396923 Z M65.0375858,30.867503 C62.808,32.7749586 60.5287101,34.0632426 58.2252781,34.0632426 C56.1937988,34.0632426 55.0044497,32.948213 55.0044497,31.139929 C55.0044497,29.1827692 56.3178225,28.2168521 59.0177041,27.3496331 L65.0375858,25.4170888 L65.0375858,30.867503 Z M132.627503,24.847503 C132.627503,14.8392189 126.459219,9.58738462 118.209751,9.58738462 C109.960284,9.58738462 103.742296,14.8392189 103.742296,24.847503 C103.742296,34.732 109.960284,39.9589822 118.209751,39.9589822 C126.459219,39.9589822 132.627503,34.732 132.627503,24.847503 Z M124.501822,24.847503 C124.501822,30.8425325 121.851172,33.1959053 118.259219,33.1959053 C114.667266,33.1959053 111.991527,30.8671479 111.991527,24.847503 C111.991527,18.7038343 114.667266,16.3253728 118.259219,16.3253728 C121.851172,16.3253728 124.501822,18.7286864 124.501822,24.847503 Z"/>
			    <mask id="logo-d" fill="#fff">
			      <use xlink:href="#logo-c"/>
			    </mask>
			    <polygon fill="#fff" fill-rule="nonzero" points="36.868 6.094 45.216 6.094 45.216 0 36.868 0" mask="url(#logo-d)"/>
			    <mask id="logo-f" fill="#fff">
			      <use xlink:href="#logo-e"/>
			    </mask>
			    <polygon fill="#fff" fill-rule="nonzero" points="36.868 39.34 45.216 39.34 45.216 10.157 36.868 10.157" mask="url(#logo-f)"/>
			    <mask id="logo-h" fill="#fff">
			      <use xlink:href="#logo-g"/>
			    </mask>
			    <path fill="#fff" fill-rule="nonzero" d="M74.26,39.339716 L82.6084024,39.339716 L82.6084024,28.9790059 C82.6084024,21.3240947 84.8133728,17.979716 92.1707692,17.3605444 L92.1707692,10.1266982 C87.3153846,10.1266982 84.0699408,11.7617278 82.4848521,15.9482367 L82.3357396,15.9482367 L82.3357396,10.1569941 L74.26,10.1569941 L74.26,39.339716 Z" mask="url(#logo-h)"/>
			    <mask id="logo-j" fill="#fff">
			      <use xlink:href="#logo-i"/>
			    </mask>
			    <polygon fill="#fff" fill-rule="nonzero" points="93.776 6.094 102.124 6.094 102.124 0 93.776 0" mask="url(#logo-j)"/>
			    <mask id="logo-l" fill="#fff">
			      <use xlink:href="#logo-k"/>
			    </mask>
			    <polygon fill="#fff" fill-rule="nonzero" points="93.776 39.34 102.124 39.34 102.124 10.157 93.776 10.157" mask="url(#logo-l)"/>
			    <mask id="logo-n" fill="#fff">
			      <use xlink:href="#logo-m"/>
			    </mask>
			    <polygon fill="#fff" fill-rule="nonzero" points="56.658 6.094 65.007 6.094 65.007 0 56.658 0" mask="url(#logo-n)"/>
			  </g>
			</svg>
		</a>
		</div>
		<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
		  <ol class="carousel-indicators">
		    <li data-target="#carouselExampleFade" data-slide-to="0" class="active"></li>
		    <li data-target="#carouselExampleFade" data-slide-to="1"></li>
		    <li data-target="#carouselExampleFade" data-slide-to="2"></li>
		  </ol>
		  <div class="carousel-inner">
		    <div class="carousel-item carousel-item__bg carousel-item__bg--5 login__carousel-item--bg active">
		      	<div class="carousel-item__experimente--vertical-align">
			      	<div class="carousel-item__caption">
			      		<img src="{{ asset('/assets/images/icon-exclusive.png') }}">
			      		<h2 class="carousel-item__caption--title">Acesse um conteúdo exclusivo</h2>
				    	<p class="carousel-item__caption--descriprion">
								Direto. Claro. Simples. Como toda informação deve ser.
				    	</p>
			  		</div>
		  		</div>
		    </div>
		    <div class="carousel-item carousel-item__bg carousel-item__bg--4 login__carousel-item--bg">
					<div class="carousel-item__experimente--vertical-align">
						<div class="carousel-item__caption">
							<img src="{{ asset('/assets/images/icon-calendar.png') }}">
							<h2 class="carousel-item__caption--title">Busque uma edição por data</h2>
				    	<p class="carousel-item__caption--descriprion">
								Acesse a busca por datas facilmente pelo menu principal do Diário Digital.
				    	</p>
			  		</div>
		  		</div>
		    </div>
		    <div class="carousel-item carousel-item__bg carousel-item__bg--6 login__carousel-item--bg">
					<div class="carousel-item__experimente--vertical-align">
						<div class="carousel-item__caption">
							<img src="{{ asset('/assets/images/icon-acervo-v2.png') }}">
							<h2 class="carousel-item__caption--title">Leia a notícia em primeira mão</h2>
				    	<p class="carousel-item__caption--descriprion">
								O assinante do jornal digital recebe a edição antes do impresso.
				    	</p>
			  		</div>
		  		</div>
		    </div>
				<!-- <div class="carousel-item carousel-item__bg carousel-item__bg--5 login__carousel-item--bg active">
						<div class="carousel-item__experimente--vertical-align">
							<div class="carousel-item__caption">
								<img src="{{ asset('/assets/images/icon-download.png') }}">
								<h2 class="carousel-item__caption--title">Download das edições</h2>
							<p class="carousel-item__caption--descriprion">
								Você pode baixar todo o conteúdo pela web, tablet ou smartphone.
							</p>
						</div>
					</div>
				</div> -->
<!-- 		    <div class="carousel-item carousel-item__bg carousel-item__bg--6 login__carousel-item--bg">
		      	<div class="carousel-item__experimente--vertical-align">
			      	<div class="carousel-item__caption">
			      		<img src="{{ asset('/assets/images/icon-acervo-v2.png') }}">
			      		<h2 class="carousel-item__caption--title">Acesse todo o acervo</h2>
				    	<p class="carousel-item__caption--descriprion">
				    		Mais de 30 anos de edições disponíveis para você.
				    	</p>
			  		</div>
		  		</div>
		    </div> -->
		  </div>
		</div>
	</div>

	<div class="experimente-content-left login-content-right login-content-right--mobile">
		
		<div class="experimente-content-left__logo hidden-sm-hidden-md hidden-lg">
			<img class="img-responsive" src="{{ asset('/assets/images/diario-logo.svg') }}" height="50" />
		</div>

		<div class="experimente-content-left__login right__experimente--xs">
			<a href="{{ url('/')}}" class="login__back">
				← Assine grátis por 15 dias
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
				Dúvidas? Deseja assinar o Diário Digital? Entre em contato com nossa Central de Atendimento <a href="tel:+558532669191">(85) 3266-9191</a>
			</div>
		</div>
	</div>

</div>

@endsection