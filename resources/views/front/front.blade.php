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


<script type="text/javascript">

  $('.sample-container div').FlipBook({pdf: "{{route('uploads', ['ano' => $year, 'mes' =>  $mounth,'dia' => $day, 'arquivo' => 'ed_12_5c251cf29e75f.pdf'])}}"});


</script>


@stop