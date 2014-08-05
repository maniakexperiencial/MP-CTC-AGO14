@extends('kids.layout')


@section('left_menu')
<a href="{{ URL::route('kids_cuentos') }}"><img src="{{ URL::to('/img/cuentos.jpg') }}"></a>
<a href="{{ URL::route('kids_videos') }}"><img src="{{ URL::to('/img/video.jpg') }}"></a>
<a href="{{ URL::route('kids') }}"><img src="{{ URL::to('/img/bases.jpg') }}"></a>
@stop


@section('title_section')
Cuentos
@stop

@section('content_center')
    <div class="cuento_box">
        <div class="cuento_title">La Casa Azul</div>
        <div class="cuento_by">José Garcia</div>
        <div class="cuento_age">13 años</div>
        <div class="cuento_image"></div>
        <div class="ui grid">
            <div class="row">
                <div class="eight wide column"><i class="thumbs up icon"></i>153</div>
                <div class="eight wide column"><i class="unhide icon"></i>2547</div>
            </div>
         </div>
    </div>

<div class="cuento_box">
    <div class="cuento_title">La Casa Azul</div>
    <div class="cuento_by">José Garcia</div>
    <div class="cuento_age">13 años</div>
    <div class="cuento_image"></div>
    <div class="ui grid">
        <div class="row">
            <div class="eight wide column"><i class="thumbs up icon"></i>153</div>
            <div class="eight wide column"><i class="unhide icon"></i>2547</div>
        </div>
    </div>
</div>

<div class="cuento_box">
    <div class="cuento_title">La Casa Azul</div>
    <div class="cuento_by">José Garcia</div>
    <div class="cuento_age">13 años</div>
    <div class="cuento_image"></div>
    <div class="ui grid">
        <div class="row">
            <div class="eight wide column"><i class="thumbs up icon"></i>153</div>
            <div class="eight wide column"><i class="unhide icon"></i>2547</div>
        </div>
    </div>
</div>

<div class="cuento_box">
    <div class="cuento_title">La Casa Azul</div>
    <div class="cuento_by">José Garcia</div>
    <div class="cuento_age">13 años</div>
    <div class="cuento_image"></div>
    <div class="ui grid">
        <div class="row">
            <div class="eight wide column"><i class="thumbs up icon"></i>153</div>
            <div class="eight wide column"><i class="unhide icon"></i>2547</div>
        </div>
    </div>
</div>

<div class="cuento_box">
    <div class="cuento_title">La Casa Azul</div>
    <div class="cuento_by">José Garcia</div>
    <div class="cuento_age">13 años</div>
    <div class="cuento_image"></div>
    <div class="ui grid">
        <div class="row">
            <div class="eight wide column"><i class="thumbs up icon"></i>153</div>
            <div class="eight wide column"><i class="unhide icon"></i>2547</div>
        </div>
    </div>
</div>




@stop



@section('javacode')
<script type="text/javascript">

    // Running the code when the document is ready
    $(document).ready(function(){
     var bg="{{ URL::to('/img/background-kids_cuento1.jpg') }}";
     $(window).height();

        $('body').css({'background-image': 'url('+bg+')'});

    });

</script>
@stop