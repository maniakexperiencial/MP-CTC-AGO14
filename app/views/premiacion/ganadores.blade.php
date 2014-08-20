@extends('premiacion.layout')
@section('bg_move')
<div class="bg"></div>
<!--<div class="ui one column page grid bg_adition">-->
<div class="ui one column page grid bg_adition">
    <div class="center_container" >
        <div class="column" style="height:100%">
            <div class="ui grid" style="height:100%">
                <div class="row" style="height:100%">

                    <div class="three wide column"  style="height:100%">


                        <img  border="0" src="{{ URL::to('/img/copa.png') }}" >



                    </div>
                    <div class="thirteen wide column ">

                    </div>


                </div>
            </div>

        </div>
    </div>
</div>
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
<div style="width: 100%; height: 60px;float:left;"></div>
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
        //$('#content_wrap').css({'background-image': 'url('+extra+')','background-position':'3% 100%','background-repeat':'no-repeat','background-size':'10%'});
       // $('.bg_adition').css({'background-image': 'url('+extra+')','background-position':'13% 100%','background-repeat':'no-repeat','background-size':'7%'});


    });

</script>
@stop