@auth
<!-- Navigation Bar-->
<header id="topnav">
    <nav class="navbar-custom">

        <div class="container-fluid">
            <ul class="list-unstyled topbar-right-menu float-right mb-0 logo-fix">

                <li class="dropdown notification-list">

                    <a class="navbar-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>


                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-119px, 70px, 0px);">
                    <!-- item-->
                        <a href="{{ route('edicaoGet') }}" class="dropdown-item notify-item">
                            <i class="fe-plus-circle"></i> Cadastrar Edição
                        </a>
                        <a href="{{ route('lista_edicao') }}" class="dropdown-item notify-item">
                            <i class="fe-list"></i> Listar Edições
                        </a>
                        <a href="{{ route('classificadoGet') }}" class="dropdown-item notify-item">
                            <i class="fe-plus-circle"></i> Cadastrar Classificados
                        </a>
                        <a href="{{ route('lista_classificado') }}" class="dropdown-item notify-item">
                            <i class="fe-list"></i> Listar Classificados
                        </a>
                        <a href="{{ route('register') }}" class="dropdown-item notify-item">
                            <i class="fe-user-plus"></i>Cadastrar Usuários
                        </a>
                    </div>
                </li>

                <li class="dropdown notification-list">
                   @if(Auth::guard('web')->check())
                    <a class="nav-link dropdown-toggle nav-user mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <small class="pro-user-name ml-1">
                            {{Auth::user()->name}}
                        </small>
                    </a>
                    @endif 

                    @if (\Request::is('assinante'))  
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                        <!-- item-->
                        <a href="{{ url('/logoutAssinante') }}" class="dropdown-item notify-item">
                            <i class="fe-log-out"></i>
                            <span>Sair</span>
                        </a>
                    </div>
                    @else
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                        <!-- item-->
                        <a href="{{ url('/logout') }}" class="dropdown-item notify-item">
                            <i class="fe-log-out"></i>
                            <span>Sair</span>
                        </a>
                    </div>
                    @endif
                </li>

            </ul>

            <ul class="list-inline menu-left mb-0">
                <li class="float-left">
                    <a href="{{ url('/login') }}" class="logo">
                        <span class="logo-lg">
                            <img src="{{ asset('/assets/images/logo-diario-do-nordeste-dd.svg') }}" alt="" height="18">
                        </span>
                        <span class="logo-sm">
                            <img src="{{ asset('/assets/images/logo-diario-do-nordeste-dd.svg') }}" alt="" height="28">
                        </span>
                    </a>
                </li>
       
            </ul>
        </div>

    </nav>
    <!-- end topbar-main -->

    <div class="topbar-menu">
        <div class="container-fluid">
            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">

					@if(Auth::guard('web')->check())
                        @if (!\Request::is('assinante'))  
						<li class="has-submenu">
							<a data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
								<i class="fe-plus-circle"></i>Cadastrar <i class="fe-chevron-down"></i>
							</a>

                            <div class="dropdown-menu dropdown-menu-left dropdown-menu-animated profile-dropdown ">
                                <!-- item-->
                                <a href="{{ route('edicaoGet') }}" class="dropdown-item notify-item">
                                    <i class="fe-plus-circle"></i> Cadastrar Edição
                                </a>
                                <!-- item-->
                                <a href="{{ route('classificadoGet') }}" class="dropdown-item notify-item">
                                    <i class="fe-plus-circle"></i> Cadastrar Classificados
                                </a>
                            </div>

						</li>


						<li class="has-submenu">
							<a data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
								<i class="fe-list"></i>Listagens <i class="fe-chevron-down"></i>
							</a>

                            <div class="dropdown-menu dropdown-menu-left dropdown-menu-animated profile-dropdown ">
                                <!-- item-->
                                <a href="{{ route('lista_edicao') }}" class="dropdown-item notify-item">
                                    <i class="fe-list"></i> Listar Edições
                                </a>
                                <!-- item-->
                                <a href="{{ route('lista_classificado') }}" class="dropdown-item notify-item">
                                    <i class="fe-list"></i> Listar Classificados
                                </a>
                            </div>
						</li>
						<li class="has-submenu">
							<a href="{{ route('register') }}">
								<i class="fe-user-plus"></i>Cadastrar Usuários
							</a>
						</li>
                        @endif
					@endif

                </ul>
                <!-- End navigation menu -->

                <div class="clearfix"></div>
            </div>
            <!-- end #navigation -->
        </div>
        <!-- end container -->
    </div>
    <!-- end navbar-custom -->
</header>
<!-- End Navigation Bar-->
@endauth
