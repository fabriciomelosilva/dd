@extends('layouts.app')
@section('content')

<div class="wrapper">
	<div class="container-fluid">

		<!-- start page title -->
		<div class="row">
			<div class="col-12">
				<div class="page-title-box">
					<h4 class="page-title">Edições</h4>
				</div>
			</div>
		</div>

		<div class="row">

			@foreach ($edicao as $value)

			{{ !$year = (string) $value->ed_year}}
			{{ !$mounth = (string) $value->ed_mounth}}
			{{ !$day = (string) $value->ed_day}}
			{{ !$file_name = (string) $value->ed_file_name}}

			<div class="col-lg-6 col-xl-3">
				<div class="card d-block">
					<div class="card-body">
						<h5 class="card-title">{{$value->ed_day}}/{{$value->ed_mounth}}/{{$value->ed_year}}</h5>
						<h6 class="card-subtitle text-muted">Status:
							<?php if ($value->ed_status == 1): ?>
								<span class="badge badge-success badge-pill">Publicada</span>
							<?php endif; ?>

							<?php if ($value->ed_status == 0): ?>
								<span class="badge badge-warning badge-pill">Em Rascunho</span>
							<?php endif; ?>
						</h6>
					</div>

					<img class="img-fluid" src="{{ url('/uploadsThumb/app/edicao/'.$value->ed_year.'/'.$value->ed_mounth.'/'.$value->ed_day.'/'.$value->ed_capa) }}" alt="Card image cap">

					<div class="card-footer">
						<div class="d-flex justify-content-end">
							<form class="form" action="front" method="post" target="_blank">
								{{csrf_field()}}
								<input name="year" type="hidden" value="{{$year}}">
								<input name="mounth" type="hidden" value="{{$mounth}}">
								<input name="day" type="hidden" value="{{$day}}">
								<input name="file_name" type="hidden" value="{{$file_name}}">
								<button type="submit" class="btn btn-link">Visualizar</button>
							</form>

							<a href="{{ route('editarEdicaoGet', ['edicao' => $value]) }}" class="btn btn-link">Editar</a>

							<form class="form" action="{{route('alterarStatusPost', ['id'=>$value->id])}}" method="post">
								{{csrf_field()}}
								<?php if ($value->ed_status == 0): ?>
									<input name="status" type="hidden" value="1">
									<button type="submit" class="btn btn-primary">Publicar</button>
								<?php endif; ?>
								<?php if ($value->ed_status == 1): ?>
									<input name="status" type="hidden" value="0">
									<button type="submit" class="btn btn-danger">Remover</button>
								<?php endif; ?>
							</form>
						</div>
					</div>
				</div>
			</div><!-- end col -->
			@endforeach
		</div>

		<nav class="d-flex justify-content-center">
			<ul class="pagination ">
				{{$edicao->links()}}
			</ul>
		</nav>
	</div>
</div>
@stop


