@extends('layouts.app')
@section('content')

<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Novo Usuário</h4>
                    </div>
                </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-body">
                        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}

                            <div class="form-group row">
                                <div class="col-sm-10 offset-sm-1">
                                    <label for="name" class="col-sm-12 col-form-label">Nome</label>
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-10 offset-sm-1">
                                    <label for="email" class="col-sm-12 col-form-label">E-Mail</label>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-10 offset-sm-1">
                                    <label for="password" class="col-sm-12 col-form-label">Senha</label>
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-10 offset-sm-1">
                                    <label for="password-confirm" class="col-sm-12 col-form-label">Confirme sua senha</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="mt-4 mb-1">
                                <div class="text-right d-print-none">
                                    <div class="col-sm-10 offset-sm-1">
                                        <button type="submit" class="btn btn-edicao">
                                            Cadastrar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
