@extends('kids.layout')


@section('left_menu')
<a href="{{ URL::route('kids_cuentos') }}"><img src="{{ URL::to('/img/cuentos.jpg') }}"></a>
<a href="{{ URL::route('kids_videos') }}"><img src="{{ URL::to('/img/video.jpg') }}"></a>
<a href="{{ URL::route('kids') }}"><img src="{{ URL::to('/img/bases.jpg') }}"></a>
@stop


@section('title_section')

@stop



@section('javacode')
<script type="text/javascript">

    // Running the code when the document is ready
    $(document).ready(function(){
        var bg="{{ URL::to('/img/background-kids.jpg') }}";
        $(window).height();

        $('body').css({'background-image': 'url('+bg+')'});
        $('#center_actionbar').hide();
        $('.Action_bar').hide();
    });

</script>
@stop