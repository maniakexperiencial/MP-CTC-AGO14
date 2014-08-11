@extends('premiacion.layout')
@section('bg_move')
<div class="bg"></div>
@stop

@section('top_sidebar')
<img  src="{{ URL::to('/img/sol.png') }}">
@stop
@section('bottom_sidebar')
<img class="invisible"  src="{{ URL::to('/img/copa.png') }}">
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
    <div class="ganador_box ganador_1">
        <div class="ganador_title">La Casa Azul</div>
        <div class="ganador_info">-José García</div>
        <div class="ganador_age">13 años</div>
    </div>
    <div class="ganador_box ganador_1">
        <div class="ganador_title">La Casa Azul</div>
        <div class="ganador_info">-José García</div>
        <div class="ganador_age">13 años</div>
    </div>
    <div class="ganador_box ganador_1">
        <div class="ganador_title">La Casa Azul</div>
        <div class="ganador_info">-José García</div>
        <div class="ganador_age">13 años</div>
    </div>
    <div class="ganador_box ganador_1">
        <div class="ganador_title">La Casa Azul</div>
        <div class="ganador_info">-José García</div>
        <div class="ganador_age">13 años</div>
    </div>
    <div class="ganador_box ganador_1">
        <div class="ganador_title">La Casa Azul</div>
        <div class="ganador_info">-José García</div>
        <div class="ganador_age">13 años</div>
    </div>
@stop



@section('javacode')
<script type="text/javascript">

    // Running the code when the document is ready
    $(document).ready(function(){



        var bg="{{ URL::to('/img/bg_land.jpg') }}";
        var extra="{{ URL::to('/img/copa.png') }}";
     $(window).height();

        $('body').css({'background-image': 'url('+bg+')'});
        $('#content_wrap').css({'background-image': 'url('+extra+')','background-position':'3% 100%','background-repeat':'no-repeat','background-size':'10%'});



    });

</script>
@stop