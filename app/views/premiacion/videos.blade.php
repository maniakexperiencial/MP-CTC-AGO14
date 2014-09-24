@extends('premiacion.layout')


@section('scripts')



{{ HTML::style('js/nivo/nivo-lightbox.css') }}
{{ HTML::style('js/nivo/themes/default/default.css') }}
{{ HTML::script('js/nivo/nivo-lightbox.min.js') }}
<!-- Optionally add helpers - button, thumbnail and/or media -->
@stop

@section('filter')
<select id="Selectbox">
    <option value="" selected>Categoria</option>
    <option value="{{URL::to('premiacion/videos/6')}}">6-7</option>
    <option value="{{URL::to('premiacion/videos/8')}}">8-12</option>
</select>
@stop

@section('bg_move')
<div class="bg"></div>
<!--<div class="ui one column page grid bg_adition">-->
<div class="ui one column page grid bg_adition">
    <div class="center_container">
        <div class="column" style="height:100%">
            <div class="ui grid" style="height:100%">
                <div class="row" style="height:100%">

                    <div class="three wide column"  style="height:100%">


                        <!--<img  border="0" src="{{ URL::to('/img/copa.png') }}" >-->



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
Videos
<img class="papalote" src="{{ URL::to('/img/papalote.png') }}">
@stop

@section('content_center')
<!--<div class="hidden_video" id="video2" >
    <div class="hidden_video_title"><h2 style="margin-top: 0;">Titulo del Cuento</h2><h5>-Jose García 13 años</h5></div>
    <iframe style="min-height:70%; width:70%;height:300px;margin: auto;"  src="//www.youtube.com/embed/JXoAmDDPZz4" frameborder="0" allowfullscreen></iframe>


</div>-->

<div  class="resize_container">
    <!--resize_contain-->
    @foreach($videos as $video)
    <div class="hidden_video" id="video{{$video->id}}" >
        <div class="hidden_video_title"><h2 style="margin-top: 0;">{{$video->title}}</h2><h5>-{{$video->name}} {{$video->age}} años</h5></div>
        <iframe style="min-height:70%; width:70%;height:300px;margin: auto;"  src="//www.youtube.com/embed/{{$video->code}}" frameborder="0" allowfullscreen></iframe>


    </div>


    <a href="#video{{$video->id}}" data-lightbox-type="inline" data-lightbox-gallery="gallery1"  ><div class="video_box">
            <div class="video_title">{{$video->title}}</div>
            <div class="video_by">{{$video->name}}</div>
            <div class="video_age">{{$video->age}} años</div>

        </div></a>
    @endforeach
<!--<a href="#video2" data-lightbox-type="inline" data-lightbox-gallery="gallery1"  ><div class="video_box">
        <div class="video_title">La Casa Azul</div>
        <div class="video_by">José Garcia</div>
        <div class="video_age">13 años</div>

    </div></a>

<a href="#video2"  data-lightbox-type="inline" data-lightbox-gallery="gallery1"><div class="video_box">
        <div class="video_title">La Casa Azul</div>
        <div class="video_by">José Garcia</div>
        <div class="video_age">13 años</div>

    </div></a>

<a href="#video2"  data-lightbox-type="inline" data-lightbox-gallery="gallery1"><div class="video_box">
        <div class="video_title">La Casa Azul</div>
        <div class="video_by">José Garcia</div>
        <div class="video_age">13 años</div>

    </div></a>

<a href="#video2"  data-lightbox-type="inline" data-lightbox-gallery="gallery1"><div class="video_box">
        <div class="video_title">La Casa Azul</div>
        <div class="video_by">José Garcia</div>
        <div class="video_age">13 años</div>

    </div></a>-->
    <!--end resize_contain-->
</div>
<div class="pagination_wrap" style="">
    <!--<ul class="number_page" ><a href="#"><li><img src="{{ URL::to('/img/back.png') }}" ></li></a><a href="#"><li >1</li></a><a href="#"><li>2</li></a><a href="#"><li>3</li></a><a href="#"><li><img src="{{ URL::to('/img/next.png') }}" ></li></a></ul>-->
    {{$videos->links()}}
</div>
@stop



@section('javacode')
<script type="text/javascript">

    // Running the code when the document is ready
    $(document).ready(function(){

        $('a').nivoLightbox();

        var bg="{{ URL::to('/img/bg_land.jpg') }}";
     $(window).height();
        var extra="{{ URL::to('/img/copa.png') }}";
        //$('#content_wrap').css({'background-image': 'url('+extra+')','background-position':'3% 100%','background-repeat':'no-repeat','background-size':'10%'});
        $('body').css({'background-image': 'url('+bg+')'});
        //$('.bg_adition').css({'background-image': 'url('+extra+')','background-position':'13% 100%','background-repeat':'no-repeat','background-size':'7%'});
        $('.video_box').eq( 2).css('margin-bottom','0px');
        $('.video_box').eq( 3).css('margin-bottom','0px');


        jQuery("#Selectbox").change(function () {
            location.href = jQuery(this).val();
        });
        $('.Action_bar').hide();
    });

</script>
@stop