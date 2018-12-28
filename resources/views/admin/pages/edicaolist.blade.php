@extends('layouts.app')
@section('content')


@foreach ($edicao as $value)



{{ 
    $year = (string) $value->ed_year 
    
    
}}

<ul class="collection with-header">

    <li class="collection-header"><h4>{{$value->ed_day}}/{{$value->ed_mounth}}/{{$value->ed_year}}</h4></li>
    <!--<li class="collection-item"><div>Edição<a href="{{ URL::to('uploads/app/' . $value->url) }}" class="secondary-content"><i class="material-icons">send</i></a></div></li>-->
    <!--<li class="collection-item"><div>Edição<a href="{{route('uploads', ['ano' => $year, 'mes' => '08','dia' => '01', 'arquivo' => 'ed_01_5c253fed131f5.pdf'])}}" class="secondary-content"><i class="material-icons">send</i></a></div></li>-->
    <li class="collection-item"><div>Edição<a href="{{route('front')}}" class="secondary-content"><i class="material-icons">send</i></a></div></li>
</ul>
      

@endforeach


{{ $edicao->links() }}


@stop
