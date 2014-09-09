@extends('doctores.layout')

@section('bg_move')
<div class="bg"></div>
<div class="ui one column page grid bg_adition">
    <div class="center_container">
                <div class="column" style="height:100%">
                    <div class="ui grid" style="height:100%">
                        <div class="row" style="height:100%">

                            <div class="three wide column"  style="height:100%">


                                <img  border="0" src="{{ URL::to('/img/doctor.png') }}" >



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
<img class="invisible"  src="{{ URL::to('/img/doctor.png') }}">
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
        var extra="{{ URL::to('/img/doctor.png') }}";
        //$('#content_wrap').css({'background-image': 'url('+extra+')','background-position':'2% 100%','background-repeat':'no-repeat','background-size':'12%'});
        $('body').css({'background-image': 'url('+bg+')'});
        //$('.bg_adition').css({'background-image': 'url('+extra+')','background-position':'13% 93%','background-repeat':'no-repeat','background-size':'7%'});

        $('#center_actionbar').hide();
        $('.Action_bar').hide();
    });

</script>
@stop