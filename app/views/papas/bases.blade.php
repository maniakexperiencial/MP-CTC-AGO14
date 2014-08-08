@extends('papas.layout')

@section('top_sidebar')
<img  src="{{ URL::to('/img/sol.png') }}">
@stop
@section('bottom_sidebar')
<img class="invisible"  src="{{ URL::to('/img/papas.png') }}">
@stop





@section('title_section')
Bases
<img class="papalote" src="{{ URL::to('/img/papalote.png') }}">
@stop

@section('content_center')
<div class="center_text">
<img src="{{ URL::to('/img/base1.png') }}">
</div>


@stop



@section('javacode')
<script type="text/javascript">

    // Running the code when the document is ready
    $(document).ready(function(){
        var bg="{{ URL::to('/img/background-papas_inside.jpg') }}";
     $(window).height();
        var extra="{{ URL::to('/img/papas.png') }}";
        $('#content_wrap').css({'background-image': 'url('+extra+')','background-position':'3% 100%','background-repeat':'no-repeat','background-size':'15%'});
        $('body').css({'background-image': 'url('+bg+')'});

    });

</script>
@stop