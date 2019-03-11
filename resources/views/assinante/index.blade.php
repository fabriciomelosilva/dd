@extends('layouts.app')

@section('content')

<div class="container-fluid">
	<!-- start page title -->
	<div class="row">
		<div class="col-12">
			<div class="page-title-box">
				<h4 class="page-title">Edições</h4>
			</div>
		</div>
	</div>
	<!-- end page title --> 
    
	
	<div class="bg-white">
		<div class="row">
			<div class="col-12">
				<div class="p-3 border-bottom">
					<ul class="nav justify-content-center">
						<li class="dropdown mr-4 mr-lg-5 nav-item">
							<p class="d-inline font-14 mr-2 text-muted">Ano:</p>
							<button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> 2019 <span class="caret"></span> </button>
							<div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 37px, 0px);">
								<a class="dropdown-item" href="#">2019</a>
								<a class="dropdown-item" href="#">2018</a>
								<a class="dropdown-item" href="#">2017</a>
							</div>
						</li>

						<li class="nav-item dropdown">
							<p class="d-inline font-14 mr-2 text-muted">Mês:</p>
							<button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Março <span class="caret"></span> </button>
							<div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 37px, 0px);">
								<a class="dropdown-item" href="#">Janeiro</a>
								<a class="dropdown-item" href="#">Fevereiro</a>
								<a class="dropdown-item" href="#">Março</a>
								<a class="dropdown-item" href="#">Abril</a>
								<a class="dropdown-item" href="#">Maio</a>
								<a class="dropdown-item" href="#">Junho</a>
								<a class="dropdown-item" href="#">Julho</a>
								<a class="dropdown-item" href="#">Agosto</a>
								<a class="dropdown-item" href="#">Setembro</a>
								<a class="dropdown-item" href="#">Outubro</a>
								<a class="dropdown-item" href="#">Novembro</a>
								<a class="dropdown-item" href="#">Dezembro</a>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="row p-4">
			<div class="col-lg-6 col-xl-3">
				<a href="#" class="card">
					<img class="card-img-top img-fluid" src="http://via.placeholder.com/300x425" alt="Card image cap">
					<div class="card-body">
						<p class="font-14 m-0 text-center text-muted">24/04/2019</p>
					</div>
				</a>
			</div>

			<div class="col-lg-6 col-xl-3">
				<a href="#" class="card m-0">
					<img class="card-img-top img-fluid" src="http://via.placeholder.com/300x425" alt="Card image cap">
					<div class="card-body">
						<p class="font-14 m-0 text-center text-muted">24/04/2019</p>
					</div>
				</a>
			</div>

			<div class="col-lg-6 col-xl-3">
				<div class="card m-0">
					<img class="card-img-top img-fluid" src="http://via.placeholder.com/300x425" alt="Card image cap">
					<div class="card-body">
						<p class="font-14 m-0 text-center text-muted">24/04/2019</p>
					</div>
				</div>
			</div>

			<div class="col-lg-6 col-xl-3">
				<div class="card m-0">
					<img class="card-img-top img-fluid" src="http://via.placeholder.com/300x425" alt="Card image cap">
					<div class="card-body">
						<p class="font-14 m-0 text-center text-muted">24/04/2019</p>
					</div>
				</div>
			</div>

			<div class="col-lg-6 col-xl-3">
				<div class="card m-0">
					<img class="card-img-top img-fluid" src="http://via.placeholder.com/300x425" alt="Card image cap">
					<div class="card-body">
						<p class="font-14 m-0 text-center text-muted">24/04/2019</p>
					</div>
				</div>
			</div>

			<div class="col-lg-6 col-xl-3">
				<div class="card m-0">
					<img class="card-img-top img-fluid" src="http://via.placeholder.com/300x425" alt="Card image cap">
					<div class="card-body">
						<p class="font-14 m-0 text-center text-muted">24/04/2019</p>
					</div>
				</div>
			</div>

		</div>
		<nav class="p-4">
			<ul class="pagination justify-content-center  m-0">
				<li class="page-item disabled">
					<a class="page-link" href="#" tabindex="-1">
						<i class="dripicons-arrow-thin-left"></i>
					</a>
				</li>
				<li class="page-item"><a class="page-link" href="#">1</a></li>
				<li class="page-item"><a class="page-link" href="#">2</a></li>
				<li class="page-item"><a class="page-link" href="#">3</a></li>
				<li class="page-item">
					<a class="page-link" href="#">
						<i class="dripicons-arrow-thin-right"></i>
					</a>
				</li>
			</ul>
		</nav>
	
	</div>
</div>

@endsection
