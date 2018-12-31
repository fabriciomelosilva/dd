@extends('layouts.app')
@section('content')


@foreach ($edicao as $value)


{{ !$year = (string) $value->ed_year}} 
{{ !$mounth = (string) $value->ed_mounth}} 
{{ !$day = (string) $value->ed_day}}
{{ !$file_name = (string) $value->ed_file_name}}

<ul class="collection with-header">

    <li class="collection-header"><h4>{{$value->ed_day}}/{{$value->ed_mounth}}/{{$value->ed_year}}</h4></li>
    <!--<li class="collection-item"><div>Edição<a href="{{ URL::to('uploads/app/' . $value->url) }}" class="secondary-content"><i class="material-icons">send</i></a></div></li>-->
  
    <a href="{{ route('editarEdicaoGet', ['edicao' => $value]) }}" class="btn btn-default">Editar</a>

    <form class="form" action="front" method="post">
        {{csrf_field()}}
        <input name="year" type="hidden" value="{{$year}}">
        <input name="mounth" type="hidden" value="{{$mounth}}">
        <input name="day" type="hidden" value="{{$day}}">
        <input name="file_name" type="hidden" value="{{$file_name}}">

        <button type="submit" class="btn btn-default">Visualizar</button>
    </form>


</ul>
      
 
@endforeach


{{ $edicao->links() }}


@stop
