@extends('layouts.app')
@section('content')

<div class="wrapper">
	<div class="container-fluid">

		<!-- start page title -->
		<div class="row">
			<div class="col-12">
				<div class="page-title-box">
					<h4 class="page-title">Editar Edição</h4>
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
			<div class="col-12">
				<div class="card">
					<div class="card-body">

						<form class="form" id="formulario" action="{{route('editarEdicaoPost', ['edicao'=>$edicao->id])}}" method="post" enctype="multipart/form-data">
							{{csrf_field()}}
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Data</label>
								<div class="col-sm-10">
									<input value="<?php echo $edicao->ed_day."/".$edicao->ed_mounth."/".$edicao->ed_year; ?>" class="form-control" name="data_edicao" type="text" id="calendario">
								</div>
							</div>
							<div id="cadernos">
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Upload do caderno 1 </label>
									<div class="col-sm-10">
										<input type="file" class="form-control" name="edicao[]">
									</div>
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-2 col-form-label"></label>
								<div class="col-sm-10">
									<button id="novaEdicao" type="button"  class="btn btn-light btn-sm btn-rounded">
										<i class="fe-plus"></i>
										Novo carderno
									</button>

								</div>
							</div>

							<div class="mt-4 mb-1">
								<div class="text-right d-print-none">
									<button type="submit" class="btn btn-primary btn-rounded">
										<i class="fe-upload-cloud"></i>
										Editar edição
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@stop
