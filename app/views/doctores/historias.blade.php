@extends('doctores.layout')

@section('scripts')



{{ HTML::style('js/nivo/nivo-lightbox.css') }}
{{ HTML::style('js/nivo/themes/default/default.css') }}
{{ HTML::script('js/nivo/nivo-lightbox.min.js') }}
<!-- Optionally add helpers - button, thumbnail and/or media -->
@stop



@section('bg_move')
<div class="bg"></div>
<div class="ui one column page grid bg_adition">

    <div class="column" style="height:100%">
        <div class="ui grid" style="height:100%">
            <div class="row" style="height:100%">

                <div class="three wide column"  style="height:100%">


                    <img  border="0" src="{{ URL::to('/img/doctor.png') }}" style="position: absolute;bottom: 5%">



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
<img class="invisible"  src="{{ URL::to('/img/doctor.png') }}">
@stop


@section('title_section')
Historias
<img class="papalote" src="{{ URL::to('/img/papalote.png') }}">
@stop

@section('content_center')
<div class="ui grid" id="pizarron_historias">
<div class="row">
    <div class="sixteen wide column">
        <div class="hidden_history" id="historia2" >
            <div class="hidden_history_title"><h2 style="margin-top: 0;">Titulo del Cuento</h2><h4>-Jose García 13 años</h4></div>

            <div class="hidden_history_content">
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec,</p>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec,</p>
            </div>
        </div>

        <a href="#historia2" data-lightbox-type="inline" data-lightbox-gallery="gallery1"  >
            <div class="historia_box">
                <div class="historia_title">Titulo del Cuento</div>
                <div class="historia_info">
                    -Jose Luis,13

                </div>
            </div>
        </a>

        <a href="#historia2" data-lightbox-type="inline" data-lightbox-gallery="gallery1"  >
            <div class="historia_box">
                <div class="historia_title">Titulo del Cuento</div>
                <div class="historia_info">
                    -Jose Luis,13

                </div>
            </div>
        </a>
        <a href="#historia2" data-lightbox-type="inline" data-lightbox-gallery="gallery1"  >
            <div class="historia_box">
                <div class="historia_title">Titulo del Cuento</div>
                <div class="historia_info">
                    -Jose Luis,13

                </div>
            </div>
        </a>
        <a href="#historia2" data-lightbox-type="inline" data-lightbox-gallery="gallery1"  >
            <div class="historia_box">
                <div class="historia_title">Titulo del Cuento</div>
                <div class="historia_info">
                    -Jose Luis,13

                </div>
            </div>
        </a>

    </div>
</div>
</div>
<div class="pagination_wrap"style="">
    <ul class="number_page" ><a href="#"><li><img src="{{ URL::to('/img/back.png') }}" ></li></a><a href="#"><li >1</li></a><a href="#"><li>2</li></a><a href="#"><li>3</li></a><a href="#"><li><img src="{{ URL::to('/img/next.png') }}" ></li></a></ul>
</div>
@stop



@section('javacode')
<script type="text/javascript">

    // Running the code when the document is ready
    $(document).ready(function(){
        $('a').nivoLightbox();

        var bg="{{ URL::to('/img/bg_land.jpg') }}";
        var bgcontent="{{ URL::to('/img/pizarron2.png') }}";
     $(window).height();
        var extra="{{ URL::to('/img/doctor.png') }}";
        //$('#content_wrap').css({'background-image': 'url('+extra+')','background-position':'2% 100%','background-repeat':'no-repeat','background-size':'12%'});
        $('body').css({'background-image': 'url('+bg+')'});
        $('#pizarron_historias').css({'background-image': 'url('+bgcontent+')'});
       // $('.bg_adition').css({'background-image': 'url('+extra+')','background-position':'13% 93%','background-repeat':'no-repeat','background-size':'7%'});
        $(window).resize(function() {
            $('.historia_box').css('min-height',$(window).height()*.1532175) ;
            //$('.historia_box').css('height',$(window).height()*.1532175) ;
            $('#Left_bar img').css('max-height',$(window).height()*.14629049);

        });


        $('.historia_box').css('min-height',$(window).height()*.1532175) ;
        //
        $('#Left_bar img').css('max-height',$(window).height()*.14629049);



    });

</script>
@stop