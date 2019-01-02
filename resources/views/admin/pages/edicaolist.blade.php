@extends('layouts.app')
@section('content')


@foreach ($edicao as $value)


{{ !$year = (string) $value->ed_year}} 
{{ !$mounth = (string) $value->ed_mounth}} 
{{ !$day = (string) $value->ed_day}}
{{ !$file_name = (string) $value->ed_file_name}}

<ul class="collection with-header">

    <li class="collection-header"><h6 style="font-weight: bold;">{{$value->ed_day}}/{{$value->ed_mounth}}/{{$value->ed_year}}</h6></li>


    <?php if ($value->ed_status == 1): ?>
        <li class="collection-header"><h6 style="color: green;">Status: Publicada</h6></li>
    <?php endif; ?>
    <?php if ($value->ed_status == 0): ?>
        <li class="collection-header"><h6 style="color: red;">Status: Em Rascunho</h6></li>
    <?php endif; ?>
    <!--<li class="collection-item"><div>Edição<a href="{{ URL::to('uploads/app/' . $value->url) }}" class="secondary-content"><i class="material-icons">send</i></a></div></li>-->
  
    <div style="float: left; margin-right: 5px;">
        <a href="{{ route('editarEdicaoGet', ['edicao' => $value]) }}" class="btn btn-default">Editar</a>
    </div>

    <div style="float: left; margin-right: 5px;">
    <form class="form" action="front" method="post">
        {{csrf_field()}}
        <input name="year" type="hidden" value="{{$year}}">
        <input name="mounth" type="hidden" value="{{$mounth}}">
        <input name="day" type="hidden" value="{{$day}}">
        <input name="file_name" type="hidden" value="{{$file_name}}">
        <button type="submit" class="btn btn-default">Visualizar</button>
    </form>
    </div>

    <div style="float: left; margin-right: 5px;">
    <form class="form" action="front" method="post">
        {{csrf_field()}}
        <?php if ($value->ed_status == 0): ?>
            <input name="status" type="hidden" value="{{$value->ed_status}}">
            <button type="submit" class="btn btn-default">Publicar Edição</button>
        <?php endif; ?>
        <?php if ($value->ed_status == 1): ?>
            <input name="status" type="hidden" value="{{$value->ed_status}}">
            <button type="submit" class="btn btn-default">Tornar Rascunho</button>
        <?php endif; ?>
    </form>
    </div>
</ul>
      
 <br>
@endforeach


{{ $edicao->links() }}


@stop
