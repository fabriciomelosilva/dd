@extends('layouts.app')

@section('content')
<div class="wrapper">
    <div class="container">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="row welcomepage">
            <div class="col-xs-12 col-sm-2">
                <img src="{{ asset('/assets/images/journal-2-icon.png') }}" class="img-responsive">
            </div>
            <div class="col-xs-12 col-sm-10">
                <h2>Bem-vindo(a) ao painel administrativo do Diário digital</h2>
                <p>
                    Para adicionar ou editar cadernos e gerenciar usuários <span>utilize a navegação do menu superior.</span>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
