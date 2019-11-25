<!doctype html>
<html lang="pt-BR">
	<head>

    @include('partials.headertagmanager')

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Diário do Nordeste - Digital</title>
  
    <link rel="shortcut icon" type="image/ico" href="{{ asset('/images/favicon.ico') }}"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="{{ asset('/simulor/admin/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/simulor/admin/dist/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/simulor/admin/dist/css/icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/style.css') }}?v=v1.0.3" rel="stylesheet">
    <link href="{{ asset('/css/front.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />

    <script src="{{ asset('/simulor/admin/dist/js/vendor.min.js') }}"></script>
    <script src="{{ asset('/simulor/admin/dist/js/app.min.js') }}"></script>            
    <script src="{{ asset('/js/jquery-1.8.2.js') }}"></script>
    <script src="{{ asset('/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('/js/custom.js') }}"></script>

    <script>
    $(document).ready(function(){
      // Add smooth scrolling to all links
      $("a").on('click', function(event) {
        if (this.hash !== "") {
          event.preventDefault();
          var hash = this.hash;
          $('html, body').animate({
            scrollTop: $(hash).offset().top
          }, 800, function(){
            window.location.hash = hash;
          });
        } // End if
      });
    });
    </script>

	</head>

	<body class="bg-light">

        @include('partials.bodytagmanager')

		@include('partials.header')

		@yield('content')

		<div class="load-stop">
            <p class="card-center-heigh">
                <img width="100px" height="100px" src="{{ asset('/assets/images/loading_white.gif') }}">
                <span>Isso pode durar alguns minutos</span>
            </p>
        </div>

        <script>
            $( document ).ready(function() {
                $( ".load-stop" ).css('display', 'none');
            });
        </script>
	</body>
</html>