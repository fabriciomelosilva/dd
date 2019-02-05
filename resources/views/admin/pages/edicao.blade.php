@extends('layouts.app')
@section('content')

<!-- start error -->
@if ($errors->any())
<div class="alert alert-primary alert-dismissible bg-danger text-white border-0 fade show mt-2" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">×</span>
	</button>
	@foreach ($errors->all() as $error)
		{{ $error }}
	@endforeach

</div>

@endif

@if (session()->has('flash.message'))
	<div class="alert alert-primary alert-dismissible bg-sucess text-white border-0 fade show mt-2" role="alert">
		{{ session('flash.message') }}
	</div>
@endif
<!-- end error -->

<!-- start page title -->
<div class="row">
	<div class="col-12">
		<div class="page-title-box">
			<div class="page-title-right">
				<ol class="breadcrumb m-0">
					<li class="breadcrumb-item"><a href="#">Simulor</a></li>
					<li class="breadcrumb-item"><a href="#">Layouts</a></li>
					<li class="breadcrumb-item active">Light Topbar</li>
				</ol>
			</div>
			<h4 class="page-title">Cadastro</h4>
		</div>
	</div>
</div>


<!-- end page title -->
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h4 class="header-title">Nova edição</h4>
			
				<form class="form-horizontal" id="formulario" action="edicao" method="post" enctype="multipart/form-data">
					{{csrf_field()}}
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Data</label>
						<div class="col-sm-10">
							<input class="form-control" name="data_edicao" type="date" id="calendario">
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Upload do caderno</label>
						<div class="col-sm-10">
							<input type="file" class="form-control" name="edicao[]">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label"></label>
						<div class="col-sm-10">
							<button id="novaEdicao" type="button"  class="btn btn-light btn-sm btn-rounded">
								<i class="fe-plus"></i>
								Novo carderno
							</button>
							<input type="button" class="btn" id="novaEdicao" value="Novo caderno" />

						</div>

						<div class='col-sm-2'>
							<div id="cadernos">
								<label>Cardeno 1</label>
								<input type="file" name="edicao[]">
							</div>
						</div>
					</div>

					<div class="mt-4 mb-1">
						<div class="text-right d-print-none">
							<button type="submit" class="btn btn-primary btn-rounded">
								<i class="fe-upload-cloud"></i>
								Criar edição
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@stop

