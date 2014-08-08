@extends('doctores.layout')

@section('top_sidebar')
<img  src="{{ URL::to('/img/sol.png') }}">
@stop
@section('bottom_sidebar')
<img class="invisible"  src="{{ URL::to('/img/doctor.png') }}">
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
     var bg="{{ URL::to('/img/background-doctores_inside.jpg') }}";
     $(window).height();
        var extra="{{ URL::to('/img/doctor.png') }}";
        $('#content_wrap').css({'background-image': 'url('+extra+')','background-position':'2% 100%','background-repeat':'no-repeat','background-size':'12%'});
        $('body').css({'background-image': 'url('+bg+')'});

    });

</script>
@stop