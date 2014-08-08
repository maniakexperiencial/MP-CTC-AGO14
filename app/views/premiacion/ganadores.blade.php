@extends('premiacion.layout')

@section('top_sidebar')
<img  src="{{ URL::to('/img/sol.png') }}">
@stop
@section('bottom_sidebar')
<img   src="{{ URL::to('/img/copa.png') }}">
@stop


@section('title_section')
Ganadores
<img class="papalote" src="{{ URL::to('/img/papalote.png') }}">
@stop



@section('title_section')
Ganadores
@stop

@section('content_center')
    <div class="ganador_box ganador_1">
        <div class="ganador_title">La Casa Azul</div>
        <div class="ganador_info">-José García</div>
        <div class="ganador_age">13 años</div>
    </div>
    <div class="ganador_box ganador_2">

    </div>
    <div class="ganador_box ganador_3">

    </div>
    <div class="ganador_box ganador_4">

    </div>
    <div class="ganador_box ganador_5">

    </div>
    <div class="ganador_box ganador_6">

    </div>

@stop



@section('javacode')
<script type="text/javascript">

    // Running the code when the document is ready
    $(document).ready(function(){
        var bg="{{ URL::to('/img/background-premiacion_inside.jpg') }}";
        var extra="{{ URL::to('/img/copa.png') }}";
     $(window).height();

        $('body').css({'background-image': 'url('+bg+')'});
        //$('#content_wrap').css({'background-image': 'url('+extra+')','background-position':'bottom left','background-repeat':'no-repeat'});

    });

</script>
@stop