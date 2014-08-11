@extends('premiacion.layout')

@section('scripts')
{{ HTML::script('https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/jquery-ui.js') }}
{{ HTML::script('js/coverflowmaster/jquery.interpolate.js') }}
{{ HTML::script('js/coverflowmaster/jquery.mousewheel.js') }}
{{ HTML::script('js/coverflowmaster/jquery.touchSwipe.min.js') }}
{{ HTML::script('js/coverflowmaster/reflection.js') }}
{{ HTML::script('js/coverflowmaster/jquery.coverflow.js') }}

@stop

@section('bg_move')
<div class="bg"></div>
@stop

@section('top_sidebar')
<img src="{{ URL::to('/img/sol.png') }}">
@stop
@section('bottom_sidebar')
<img class="invisible" src="{{ URL::to('/img/copa.png') }}">
@stop


@section('title_section')
Galeria
<img class="papalote" src="{{ URL::to('/img/papalote.png') }}">
@stop

@section('content_center')

<div class="content_gallery" style="position: relative">
    <div class="code_wrap">
        Introduce tu código:
        <input id="code_gallery" type="text">


    </div>
    <div id="preview">
    <div class="cover_flow_content" id="preview-coverflow" style="width:100%;min-height:100%;position:relative">
        <img class="cover" src="{{ URL::to('/img/cuentos_examples/cuento1.jpg') }}"/>
        <img class="cover" src="{{ URL::to('/img/cuentos_examples/cuento2.jpg') }}"/>
        <img class="cover" src="{{ URL::to('/img/cuentos_examples/cuento3.jpg') }}"/>
        <img class="cover" src="{{ URL::to('/img/cuentos_examples/cuento1.jpg') }}"/>
        <img class="cover" src="{{ URL::to('/img/cuentos_examples/cuento2.jpg') }}"/>
        <img class="cover" src="{{ URL::to('/img/cuentos_examples/cuento3.jpg') }}"/>


    </div>
        </div>

</div>

@stop


@section('javacode')

<script type="text/javascript">

    // Running the code when the document is ready
    $(document).ready(function () {
        if ($.fn.reflect) {
            $('#preview-coverflow .cover').reflect();	// only possible in very specific situations
        }

        $('#preview-coverflow').coverflow({
            index:			3,
            density:		2,
            innerOffset:	50,
            innerScale:		.7,
            animateStep:	function(event, cover, offset, isVisible, isMiddle, sin, cos) {
                if (isVisible) {
                    if (isMiddle) {
                        $(cover).css({
                            'filter':			'none',
                            '-webkit-filter':	'none'
                        });
                    } else {
                        var brightness	= 1 + Math.abs(sin),
                            contrast	= 1 - Math.abs(sin),
                            filter		= 'contrast('+contrast+') brightness('+brightness+')';
                        $(cover).css({
                            'filter':			filter,
                            '-webkit-filter':	filter
                        });
                    }
                }
            }
        });

        var bg = "{{ URL::to('/img/bg_land.jpg') }}";
        var extra = "{{ URL::to('/img/copa.png') }}";
        $(window).height();
        $('#content_wrap').css({'background-image': 'url(' + extra + ')', 'background-position': '3% 100%', 'background-repeat': 'no-repeat', 'background-size': '10%'});
        $('body').css({'background-image': 'url(' + bg + ')'});
        $('#code_gallery').keyup(function () {

        });
    });

</script>
@stop