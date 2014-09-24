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


                       <!-- <img  border="0" src="{{ URL::to('/img/copa.png') }}" >-->



                    </div>
                    <div class="thirteen wide column ">

                    </div>


                </div>
            </div>

        </div>
    </div>
</div>
@stop

@section('filter')
{{Form::select('selectbox', [''=>'Categoria','6-7'=>'6-7','8-12'=>'8-12','papas'=>'papas','doctores'=>'doctores'], null,['class'=>'signup_blue signup_select','id'=>'Selectbox'])}}
<!--<select id="Selectbox">
    <option value="" selected>Categoria</option>

    <option value="{{URL::to('papas/historias/papas')}}">papas</option>
    <option value="{{URL::to('papas/historias/doctores')}}">doctores</option>
</select>-->

@stop





@section('top_sidebar')
<img  src="{{ URL::to('/img/sol.png') }}">
@stop
@section('bottom_sidebar')
<!--<img class="invisible"  src="{{ URL::to('/img/copa.png') }}">-->
@stop


@section('title_section')
Ganadores
<img class="papalote" src="{{ URL::to('/img/papalote.png') }}">
@stop



@section('title_section')
Ganadores
@stop

@section('content_center')

    @if($winner1a)
    <div class="ganador_box ganador_1">
        <div class="ganador_title">{{$winner1a->title}}</div>
        <div class="ganador_info">-{{$winner1a->name}}</div>
        @if($winner1a->age)
        <div class="ganador_age">{{$winner1a->age}} años</div>
        @endif
    </div>
    @endif
    @if($winner2a)
    <div class="ganador_box ganador_2">
        <div class="ganador_title">{{$winner2a->title}}</div>
        <div class="ganador_info">-{{$winner2a->name}}</div>
        @if($winner2a->age)
        <div class="ganador_age">{{$winner2a->age}} años</div>
        @endif
    </div>
    @endif
    @if($winner3a)
    <div class="ganador_box ganador_3">
        <div class="ganador_title">{{$winner3a->title}}</div>
        <div class="ganador_info">-{{$winner3a->name}}</div>
        @if($winner3a->age)
        <div class="ganador_age">{{$winner3a->age}} años</div>
        @endif
    </div>
    @endif
<div style="width: 100%; height: 60px;float:left;"></div>
    @if($winner4a)
    <div class="ganador_box ganador_4">
        <div class="ganador_title">{{$winner4a->title}}</div>
        <div class="ganador_info">-{{$winner4a->name}}</div>
        @if($winner4a->age)
        <div class="ganador_age">{{$winner4a->age}} años</div>
        @endif
    </div>
    @endif
    @if($winner5a)
    <div class="ganador_box ganador_5">
        <div class="ganador_title">{{$winner5a->title}}</div>
        <div class="ganador_info">-{{$winner5a->name}}</div>
        @if($winner5a->age)
        <div class="ganador_age">{{$winner5a->age}} años</div>
        @endif
    </div>
    @endif

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
        /*$('.Action_bar').hide();*/

        jQuery("#Selectbox").change(function () {

            location.href = "{{URL::to('premiacion/ganadores')}}"+"/"+jQuery(this).val();
        });


    });

</script>
@stop