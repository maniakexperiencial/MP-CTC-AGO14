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
Videos
<img class="papalote" src="{{ URL::to('/img/papalote.png') }}">
@stop

@section('content_center')
    <div class="video_box">
        <div class="video_title">La Casa Azul</div>
        <div class="video_by">José Garcia</div>
        <div class="video_age">13 años</div>

    </div>

<div class="video_box">
    <div class="video_title">La Casa Azul</div>
    <div class="video_by">José Garcia</div>
    <div class="video_age">13 años</div>

</div>

<div class="video_box">
    <div class="video_title">La Casa Azul</div>
    <div class="video_by">José Garcia</div>
    <div class="video_age">13 años</div>

</div>

<div class="video_box">
    <div class="video_title">La Casa Azul</div>
    <div class="video_by">José Garcia</div>
    <div class="video_age">13 años</div>

</div>


@stop



@section('javacode')
<script type="text/javascript">

    // Running the code when the document is ready
    $(document).ready(function(){
        var bg="{{ URL::to('/img/bg_land.jpg') }}";
     $(window).height();
        var extra="{{ URL::to('/img/copa.png') }}";
        $('#content_wrap').css({'background-image': 'url('+extra+')','background-position':'3% 100%','background-repeat':'no-repeat','background-size':'10%'});
        $('body').css({'background-image': 'url('+bg+')'});

    });

</script>
@stop