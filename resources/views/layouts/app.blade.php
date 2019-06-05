<!doctype html>
<html lang="pt-BR">
	<head>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TCJFC9X');</script>
<!-- End Google Tag Manager -->

<!--
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-137234529-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'UA-137234529-1');
    </script>
-->

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Diário Digital</title>
  
    <link rel="shortcut icon" type="image/ico" href="{{ asset('/images/favicon.ico') }}"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="{{ asset('/simulor/admin/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/simulor/admin/dist/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/simulor/admin/dist/css/icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/style.css') }}?v=v1.0.0" rel="stylesheet">
    <link href="{{ asset('/css/front.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />

    <script src="{{ asset('/simulor/admin/dist/js/vendor.min.js') }}"></script>
    <script src="{{ asset('/simulor/admin/dist/js/app.min.js') }}"></script>            
    <script src="{{ asset('/js/jquery-1.8.2.js') }}"></script>
    <script src="{{ asset('/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('/js/custom.js') }}"></script>

	</head>

	<body class="bg-light">

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TCJFC9X"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

		@include('partials.header')

		@yield('content')

		<div class="load-stop">
            <div>
                <img src="{{ asset('/assets/images/light-loader.gif') }}">
            </div>
        </div>

        <script>
            $( document ).ready(function() {
                $( ".load-stop" ).css('display', 'none');
            });
        </script>
	</body>
</html>