@extends('premiacion.layout')


@section('left_menu')

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

    });

</script>
@stop