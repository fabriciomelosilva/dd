@extends('layouts.app')
@section('content')

		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-4">
					<div class="card card-center-heigh">
						<div class="card-body">
							<div class="text-center w-75 m-auto">
								<a href="index.html">
									<span><img class="img-responsive" src="{{ asset('/assets/images/diario-logo.svg') }}" height="50" /></span>
								</a>
								<p class="text-muted mb-4 mt-3">Entre com seu endereço de email e senha para acessar o painel.</p>
							</div>

							<form method="POST" action="{{ route('login') }}">
								{{ csrf_field() }}
								<div class="form-group mb-3">
									<label for="emailaddress">Email</label>
									<input class="form-control" type="email" id="email" required="" name='email' value="{{ old('email') }}" placeholder="Digite seu email">
									@if ($errors->has('email'))
										<span class="help-block">
											<strong>{{ $errors->first('email') }}</strong>
										</span>
									@endif
								</div>

								<div class="form-group mb-3">
									<a href="pages-recoverpw.html" class="text-muted float-right"><small></small></a>
									<label for="password">Senha</label>
									<input class="form-control" type="password" name='password' required="" id="password" placeholder="Digite sua senha">
								</div>

								<div class="form-group mb-0 text-center">
									<button class="btn btn-primary btn-block" type="submit"> Login </button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

@endsection