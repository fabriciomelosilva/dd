@extends('layouts.app')

@section('content')
<div class="account-pages mt-5 mb-5">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-5">
				<div class="card">

					<div class="card-body p-4">
						<div class="text-center w-75 m-auto">
							<a href="index.html">
								<span><img src="assets/images/logo-dark.png" alt="" height="22"></span>
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

							<div class="form-group mb-3">
								<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="checkbox-signin" checked>
									<label class="custom-control-label" for="checkbox-signin">Remember me</label>
								</div>
							</div>

							<div class="form-group mb-0 text-center">
								<button class="btn btn-primary btn-block" type="submit"> Login </button>
							</div>

						</form>
					</div> <!-- end card-body -->
				</div>
				<!-- end card -->

				<div class="row mt-3">
					<div class="col-12 text-center">
						<p class="text-muted"><a href="{{ route('password.request') }}" class="text-muted ml-1">Esqueceu sua senha?</a></p>
					</div> <!-- end col -->
				</div>
				<!-- end row -->

			</div> <!-- end col -->
		</div>
		<!-- end row -->
	</div>
	<!-- end container -->
</div>
<!-- end page -->
@endsection
