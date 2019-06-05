@extends('layouts.app')
@section('content')


<script src="{{ URL::to('/js/html2canvas.min.js') }}"></script>
<script src="{{ URL::to('/js/three.min.js') }}"></script>
<script src="{{ URL::to('/js/pdf.min.js') }}"></script>
<script src="{{ URL::to('/js/3dflipbook.min.js') }}"></script>

<div class="container" style="padding-top: 1%">
    <div class="sample-container">
        <div>

        </div>
    </div>
</div>

<script type="text/javascript">
    var template = {
        html: './templates/default-book-view.html',
        styles: [
        './css/font-awesome.min.css',
        './css/short-white-book-view.css?v=v1.0.1'
        ],
        script: './js/default-book-view.js?v=v1.0.1'
    };
    $('.sample-container div').FlipBook({
        pdf: "{{route('uploads', ['tipo' => $type, 'ano' => $year, 'mes' =>  $month,'dia' => $day, 'arquivo' => $file_name])}}",
        template: template,
    
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
                },
                cmdSinglePage: {
                    activeForMobile: true
                }  
            }
        }  
    });

</script>

@stop