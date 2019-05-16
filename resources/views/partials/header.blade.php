@auth
<!-- Navigation Bar-->
<header id="topnav">
    <nav class="navbar-custom">

        <div class="container-fluid">
            <ul class="list-unstyled topbar-right-menu float-right mb-0">

                <li class="dropdown notification-list">
                    <!-- Mobile menu toggle-->
                    <a class="navbar-toggle nav-link">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                    <!-- End mobile menu toggle-->
                </li>

                <li class="dropdown notification-list">
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-lg">
                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h5 class="m-0">
                                <span class="float-right">
                                    <a href="" class="text-dark">
                                        <small>Clear All</small>
                                    </a>
                                </span>Notification</h5>
                        </div>

                        <div class="slimscroll noti-scroll">

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                <div class="notify-icon">
                                <p class="notify-details">Cristina Pride</p>
                                <p class="text-muted mb-0 user-msg">
                                    <small>Hi, How are you? What about our next meeting</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-light">
                                    <i class="mdi mdi-comment-account-outline"></i>
                                </div>
                                <p class="notify-details">Caleb Flakelar commented on Admin
                                    <small class="text-muted">1 min ago</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon">
                                <p class="notify-details">Karen Robinson</p>
                                <p class="text-muted mb-0 user-msg">
                                    <small>Wow ! this admin looks good and awesome design</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-light">
                                    <i class="mdi mdi-account-plus"></i>
                                </div>
                                <p class="notify-details">New user registered.
                                    <small class="text-muted">5 hours ago</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-light">
                                    <i class="mdi mdi-comment-account-outline"></i>
                                </div>
                                <p class="notify-details">Caleb Flakelar commented on Admin
                                    <small class="text-muted">4 days ago</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-light">
                                    <i class="mdi mdi-heart"></i>
                                </div>
                                <p class="notify-details">Carlos Crouch liked
                                    <b>Admin</b>
                                    <small class="text-muted">13 days ago</small>
                                </p>
                            </a>
                        </div>

                        <!-- All-->
                        <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                            View all
                            <i class="fi-arrow-right"></i>
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
                    <a href="index.html" class="logo">
                        <span class="logo-lg">
                            <img src="assets/images/logo.png" alt="" height="18">
                        </span>
                        <span class="logo-sm">
                            <img src="assets/images/logo-sm.png" alt="" height="28">
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
