@extends('layouts.app')
@section('content')


@foreach ($edicao as $value)


<ul class="collection with-header">
        <li class="collection-header"><h4>{{$value->ed_day}}/{{$value->ed_mounth}}/{{$value->ed_year}}</h4></li>
        <li class="collection-item"><div>Alvin<a href="{{ URL::to('uploads/app/' . $value->url) }}" class="secondary-content"><i class="material-icons">send</i></a></div></li>

      </ul>
      
 

@endforeach


{{ $edicao->links() }}


@stop
