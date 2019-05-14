@extends('layouts.app')

@section('content')
<div class="wrapper">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h4 class="page-title"><img src="{{ asset('/assets/images/diario-logo.svg') }}" alt="Marca" width="30%"></h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
