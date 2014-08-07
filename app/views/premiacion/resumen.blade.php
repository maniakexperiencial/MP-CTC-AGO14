@extends('premiacion.layout')

@section('top_sidebar')
<img  src="{{ URL::to('/img/sol.png') }}">
@stop
@section('bottom_sidebar')
<img  src="{{ URL::to('/img/copa.png') }}">
@stop




@section('title_section')
Resumen
<img class="papalote" src="{{ URL::to('/img/papalote.png') }}">
@stop

@section('content_center')
<div class="center_text">
<img src="{{ URL::to('/img/resumen.png') }}">
</div>


@stop



@section('javacode')
<script type="text/javascript">

    // Running the code when the document is ready
    $(document).ready(function(){
        var bg="{{ URL::to('/img/background-premiacion_inside.jpg') }}";
     $(window).height();

        $('body').css({'background-image': 'url('+bg+')'});

    });

</script>
@stop