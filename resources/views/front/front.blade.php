@extends('layouts.app')
@section('content')

<script src="{{ URL::to('/js/html2canvas.min.js') }}"></script>
<script src="{{ URL::to('/js/three.min.js') }}"></script>
<script src="{{ URL::to('/js/pdf.min.js') }}"></script>
<script src="{{ URL::to('/js/3dflipbook.min.js') }}"></script>

<div class="sample-container">
  <div>

  </div>
</div>

<script type="text/javascript">

  //$('.sample-container div').FlipBook({pdf: "{{route('uploads', ['ano' => $year, 'mes' =>  $mounth,'dia' => $day, 'arquivo' => 'ed_13_5c26c61ae1034.pdf'])}}"});
  $('.sample-container div').FlipBook({pdf: "{{route('uploads', ['ano' => $year, 'mes' =>  $mounth,'dia' => $day, 'arquivo' => $file_name])}}",
  
     controlsProps: {
     actions: {
       cmdBackward: {
         code: 37,
       },
       cmdForward: {
         code: 39
       },
       cmdZoomIn: {
       code: 38
       },
       cmdZoomOut: {
       code: 40
       }  
     }
   }  
  });
  

</script>
@stop