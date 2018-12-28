@extends('layouts.app')
@section('content')

<script src="{{ URL::to('/js/html2canvas.min.js') }}"></script>
<script src="{{ URL::to('/js/three.min.js') }}"></script>
<script src="{{ URL::to('/js/pdf.min.js') }}"></script>
<script src="{{ URL::to('/js/3dflipbook.min.js') }}"></script>

<div>
Diário do nordeste
</div>

<div class="sample-container">
  <div>

  </div>
</div>

@foreach ($edicao as $value)

{{$value->ed_day}}

<script type="text/javascript">
  //$('.sample-container div').FlipBook({pdf: "{{ URL::to('uploads/app/' . $value->url) }}"});
  $('.sample-container div').FlipBook({pdf: " {{route('uploads', ['ano' => 2018, 'mes' => '08','dia' => '01', 'arquivo' => 'ed_01_5c268d053ade3.pdf'])}}"});

 

</script>

@endforeach

@stop