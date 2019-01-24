<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Diário Digital</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link href="/simulor/admin/dist/bootstrap.min.css" rel="stylesheet">
    <link href="/simulor/admin/dist/app.css" rel="stylesheet">
    <link href="/simulor/admin/dist/icons.min.css" rel="stylesheet">

    <script src="/simulor/admin/dist/js/vendor.min.js"></script>
    <script src="/simulor/admin/dist/js/app.min.js"></script>

  </head>
  
  <nav style="background-color: #26a69a;">
        <div class="nav-wrapper">
          <a href="#" class="brand-logo center">Logo</a>
          <ul id="nav-mobile" class="left hide-on-med-and-down">
            @if(Auth::guard('web')->check())
                <li><a href="{{ route('edicaoGet') }}">Cadastrar Edição</a></li>
                <li><a href="{{ route('lista_edicao') }}">Lista de Edições</a></li>
                <li><a href="{{ route('register') }}">Usuários</a></li>

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