@extends('papas.layout')


@section('bg_move')
<div class="bg"></div>
<div class="ui one column page grid bg_adition">

    <div class="column" style="height:100%">
        <div class="ui grid" style="height:100%">
            <div class="row" style="height:100%">

                <div class="three wide column"  style="height:100%">


                    <img  border="0" src="{{ URL::to('/img/papas.png') }}" style="position: absolute;bottom: 5%">

                    <!--<img class="imagen_absoluta" src="{{ URL::to('/img/copa.png') }}">-->


                </div>
                <div class="thirteen wide column ">

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
<img class="invisible"  src="{{ URL::to('/img/papas.png') }}">
@stop





@section('title_section')
Bases
<img class="papalote" src="{{ URL::to('/img/papalote.png') }}">
@stop

@section('content_center')
<div class="center_text">
<img src="{{ URL::to('/img/base1.png') }}">
</div>


@stop



@section('javacode')
<script type="text/javascript">

    // Running the code when the document is ready
    $(document).ready(function(){
        var bg="{{ URL::to('/img/bg_land.jpg') }}";
     $(window).height();
        var extra="{{ URL::to('/img/papas.png') }}";
       // $('#content_wrap').css({'background-image': 'url('+extra+')','background-position':'3% 100%','background-repeat':'no-repeat','background-size':'15%'});
        $('body').css({'background-image': 'url('+bg+')'});

        //$('.bg_adition').css({'background-image': 'url('+extra+')','background-position':'13% 93%','background-repeat':'no-repeat','background-size':'9%'});

        $('#center_actionbar').hide();
    });

</script>
@stop