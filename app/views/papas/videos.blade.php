@extends('papas.layout')





@section('title_section')
Videos
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
     var bg="{{ URL::to('/img/background-papas_inside.jpg') }}";
     $(window).height();

        $('body').css({'background-image': 'url('+bg+')'});

    });

</script>
@stop