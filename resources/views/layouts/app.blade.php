<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Diário Digital</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">

    {!! MaterializeCSS::include_full() !!}

        
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
    <script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>

    <script src="/js/custom.js"></script>

  </head>
  
  <nav>
        <div class="nav-wrapper">
          <a href="#" class="brand-logo center">Logo</a>
          <ul id="nav-mobile" class="left hide-on-med-and-down">
            @if(Auth::guard('web')->check())
                <li><a href="">Edição</a></li>
            @endif    
        </ul>
        </div>
      </nav>
  
<body>

  <main class="site-main">
    @yield('content')
  </main>
  </body>
</html>