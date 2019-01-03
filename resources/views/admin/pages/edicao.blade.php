@extends('layouts.app')
@section('content')

<div class="container">
    <form class="form" id="formulario" action="edicao" method="post" enctype="multipart/form-data">

        <div class="form-group">
            {{csrf_field()}}
        </div>

        @if (session()->has('flash.message'))
        <div class="alert alert-{{ session('flash.class') }}">
            {{ session('flash.message') }}
        </div>
        @endif


        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif


        <div class='col-sm-16'>
            <div class="form-group">
                    <label for="basic">Data da Edição</label>
            </div>
        </div>

        <div class='col-sm-16'>
            <div class="form-group">
                    <p>Data: <input name="data_edicao" type="text" id="calendario" /></p>
                </div>
            </div>

        <div class='col-sm-16'>
            <div class="form-group">
                    <label for="basic">Faça o UPLOAD dos PDFs dos cadernos.</label>
            </div>
        </div>
        <div class='col-sm-16'>
            <div class="form-group">
                <input type="button" class="btn" id="novaEdicao" value="Novo caderno" />
            </div>
        </div>

        <div class='col-sm-16'>
            <div id="cadernos">
                <label>Cardeno 1</label>
                <input type="file" name="edicao[]">
            </div>
        </div>

        <div class='col-sm-16'>
            <div class="form-group">
                    <button type="submit" class="btn btn-default">Criar Edição</button>
            </div>
        </div>
    </form>
</div>
@stop

