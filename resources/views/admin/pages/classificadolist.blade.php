@extends('layouts.app')
@section('content')

<div class="wrapper">
	<div class="container-fluid">

		<div class="row">
			<div class="col-12">
				<div class="page-title-box">
					<h4 class="page-title">Classificados</h4>
				</div>
			</div>
		</div>

		@if (session()->has('sucess.message'))
			<div class="alert alert-success" role="alert">
				{{ session('sucess.message') }}
			</div>
		@endif

		@if (session()->has('error.message'))
			<div class="alert alert-danger" role="alert">
				{{ session('error.message') }}
			</div>
		@endif

		<div class="row">

			@foreach ($classificado as $value)

			{{ !$year = (string) $value->ed_year}}
			{{ !$month = (string) $value->ed_month}}
			{{ !$day = (string) $value->ed_day}}
			{{ !$file_name = (string) $value->ed_file_name}}

			<div class="col-lg-6 col-xl-3">
				<div class="card d-block">
					<div class="card-body">
						<h5 class="card-title">{{$value->ed_day}}/{{$value->ed_month}}/{{$value->ed_year}}</h5>
						<h6 class="card-subtitle text-muted">Status:
							@if ($value->ed_status == 1)
								<span class="badge badge-success badge-pill">Publicada</span>
							@endif

							@if ($value->ed_status == 0)
								<span class="badge badge-warning badge-pill">Em Rascunho</span>
							@endif
						</h6>
					</div>

					<div class="img-fluid" style="height:200pt; background-image: url('{{ url('/uploadsThumb/app/classificado/'.$value->ed_year.'/'.$value->ed_month.'/'.$value->ed_day.'/'.$value->ed_capa) }}'); background-size: 100%;"></div>

					<div class="card-footer">
						<div class="d-flex justify-content-end">
							<form class="form" action="visualizar" method="post">
								{{csrf_field()}}
								<input name="year" type="hidden" value="{{$year}}">
								<input name="month" type="hidden" value="{{$month}}">
								<input name="day" type="hidden" value="{{$day}}">
								<input name="file_name" type="hidden" value="{{$file_name}}">
								<input name="type" type="hidden" value="classificado">

								<button type="submit" class="btn btn-link">Visualizar</button>
							</form>

							<a href="{{ route('editarClassificadoGet', ['classificado' => $value]) }}" class="btn btn-link">Editar</a>

							<form class="form" action="{{route('alterarClassificadoStatusPost', ['id'=>$value->id])}}" method="post">
								{{csrf_field()}}
								@if ($value->ed_status == 0)
									<input name="status" type="hidden" value="1">
									<button type="submit" class="btn btn-primary">Publicar</button>
								@endif
								@if ($value->ed_status == 1)
									<input name="status" type="hidden" value="0">
									<button type="submit" class="btn btn-danger">Remover</button>
								@endif
							</form>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>

		<nav class="d-flex justify-content-center" style="z-index: 0">
			<div style="z-index: 10">
				{{$classificado->links()}}
			</div>
		</nav>
	</div>
</div>
@stop