@extends('kids.layout')

@section('scripts')



{{ HTML::style('js/nivo/nivo-lightbox.css') }}
{{ HTML::style('js/nivo/themes/default/default.css') }}
{{ HTML::script('js/nivo/nivo-lightbox.min.js') }}
<!-- Optionally add helpers - button, thumbnail and/or media -->
@stop

@section('bg_move')
<div class="bg"></div>
@stop


@section('top_sidebar')
<img  src="{{ URL::to('/img/sol.png') }}">
@stop
@section('bottom_sidebar')
<img class="invisible" src="{{ URL::to('/img/kid.png') }}">
@stop



@section('title_section')
Videos
<img class="papalote" src="{{ URL::to('/img/papalote.png') }}">
@stop

@section('content_center')
<div class="hidden_video" id="video2" >
    <div class="hidden_video_title"><h2 style="margin-top: 0;">Titulo del Cuento</h2><h5>-Jose García 13 años</h5></div>
    <iframe style="min-height:70%; width:70%;height:300px;margin: auto;"  src="//www.youtube.com/embed/JXoAmDDPZz4" frameborder="0" allowfullscreen></iframe>


</div>

<a href="#video2" data-lightbox-type="inline" data-lightbox-gallery="gallery1"  ><div class="video_box">
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

    </div></a>


<div class="pagination_wrap" style="">
    <ul class="number_page" ><a href="#"><li><img src="{{ URL::to('/img/back.png') }}" ></li></a><a href="#"><li >1</li></a><a href="#"><li>2</li></a><a href="#"><li>3</li></a><a href="#"><li><img src="{{ URL::to('/img/next.png') }}" ></li></a></ul>
</div>
@stop



@section('javacode')
<script type="text/javascript">

    // Running the code when the document is ready
    $(document).ready(function(){

        $('a').nivoLightbox();

     var bg="{{ URL::to('/img/bg_land.jpg') }}";
     $(window).height();
        var extra="{{ URL::to('/img/kid.png') }}";
        $('#content_wrap').css({'background-image': 'url('+extra+')','background-position':'2% 100%','background-repeat':'no-repeat','background-size':'12%'});
        $('body').css({'background-image': 'url('+bg+')'});

    });

</script>
@stop