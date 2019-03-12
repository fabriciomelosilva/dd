<?php
/*
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
//print_r($menu);
foreach($menu as $key => $value){
    $year = $key;
    echo '<div>'.$year.'</div>';
        foreach($value as $month){
            $month = date(mktime(0, 0, 0, $month));
            $month = ucwords(strftime('%B',$month));
            echo '<div>'.$month.'</div>';
        }
}*/
//print_r($edicao);
?>

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
			@foreach ($edicao as $value)

			{{ !$year = (string) $value->ed_year}}
			{{ !$mounth = (string) $value->ed_mounth}}
			{{ !$day = (string) $value->ed_day}}
			{{ !$file_name = (string) $value->ed_file_name}}
	
				<div class="col-lg-6 col-xl-2">				
					<form class="form" action="edicaoAssinante" method="post" target="_blank">
							{{csrf_field()}}
							<input name="year" type="hidden" value="{{$year}}">
							<input name="mounth" type="hidden" value="{{$mounth}}">
							<input name="day" type="hidden" value="{{$day}}">
							<input name="file_name" type="hidden" value="{{$file_name}}">
		
							<button type="submit" class="bg-white border-0 m-0 p-0 shadow-sm">
								<img class="img-fluid" src="{{ url('/uploadsThumbAssinante/app/edicao/'.$value->ed_year.'/'.$value->ed_mounth.'/'.$value->ed_day.'/'.$value->ed_capa) }}" alt="Card image cap">
								<div class="d-block p-4">
									<p class="font-14 m-0 text-center text-muted">{{$value->ed_day}}/{{$value->ed_mounth}}/{{$value->ed_year}}</p>
								</div>
							</button>
					</form>
				</div>
	
			@endforeach

		</div>

		<nav class="d-flex justify-content-center">
				<ul class="pagination ">
					{{$edicao->links()}}
				</ul>
		</nav>
	
	</div>
</div>

@endsection
