@extends('layouts.app')
@section('content')

<div class="wrapper">
	<div class="container-fluid">

		<div class="row">
			<div class="col-12">
				<div class="page-title-box">
					<h4 class="page-title">Nova Edição</h4>
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
			<div class="col-xs-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2">
				<div class="card">
					<div class="card-body">
					
						<form class="form-horizontal" id="formulario" action="edicao" method="post" enctype="multipart/form-data">
							{{ csrf_field() }}
							<div class="form-group row">
								<div class="col-sm-10 offset-sm-1">
									<label class="col-sm-12 col-form-label">Data</label>
									<input required class="form-control" name="data_edicao" type="text" id="calendario" autocomplete="off"/>
								</div>
							</div>
							
							<div id="cadernos">
								<div class="form-group row">
									<div class="col-sm-10 offset-sm-1">
										<label class="col-sm-12 col-form-label">Upload do caderno 1 </label>
										<input required type="file" class="form-control" name="edicao[]">
									</div>
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-1 col-form-label"></label>
								<div class="col-sm-10">
									<button id="novaEdicao" type="button"  class="btn btn-novocaderno">
										<i class="fe-plus"></i>
										Novo carderno
									</button>
								</div>
							</div>

							<div class="text-right d-print-none">
								<div class="col-sm-10 offset-sm-1">
									<button type="submit" class="btn btn-edicao" onsubmit="$('.load-stop').css('display', 'block')">
										Criar edição
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