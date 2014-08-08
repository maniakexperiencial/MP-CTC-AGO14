@extends('kids.layout')

@section('scripts')
{{ HTML::script('js/fancybox/jquery.fancybox.js') }}
{{ HTML::style('js/fancybox/jquery.fancybox.css') }}
{{ HTML::style('js/fancybox/helpers/jquery.fancybox-buttons.css') }}
{{ HTML::script('js/fancybox/helpers/jquery.fancybox-buttons.js') }}
{{ HTML::script('js/fancybox/helpers/jquery.fancybox-media.js') }}
<!-- Optionally add helpers - button, thumbnail and/or media -->
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
    <a class="fancybox-media" href="http://www.youtube.com/watch?v=opj24KnzrWo"><div class="video_box">
        <div class="video_title">La Casa Azul</div>
        <div class="video_by">José Garcia</div>
        <div class="video_age">13 años</div>

    </div></a>

<a class="fancybox-media" href="http://www.youtube.com/watch?v=opj24KnzrWo"><div class="video_box">
        <div class="video_title">La Casa Azul</div>
        <div class="video_by">José Garcia</div>
        <div class="video_age">13 años</div>

    </div></a>

<a class="fancybox-media" href="http://www.youtube.com/watch?v=opj24KnzrWo"><div class="video_box">
        <div class="video_title">La Casa Azul</div>
        <div class="video_by">José Garcia</div>
        <div class="video_age">13 años</div>

    </div></a>

<a class="fancybox-media" href="http://www.youtube.com/watch?v=opj24KnzrWo"><div class="video_box">
        <div class="video_title">La Casa Azul</div>
        <div class="video_by">José Garcia</div>
        <div class="video_age">13 años</div>

    </div></a>

@stop



@section('javacode')
<script type="text/javascript">

    // Running the code when the document is ready
    $(document).ready(function(){
        $('.fancybox-media').fancybox({
            openEffect  : 'none',
            closeEffect : 'none',
            helpers : {
                media : {}
            }
        });
     var bg="{{ URL::to('/img/background-kids_cuento1.jpg') }}";
     $(window).height();
        var extra="{{ URL::to('/img/kid.png') }}";
        $('#content_wrap').css({'background-image': 'url('+extra+')','background-position':'2% 100%','background-repeat':'no-repeat','background-size':'12%'});
        $('body').css({'background-image': 'url('+bg+')'});

    });

</script>
@stop