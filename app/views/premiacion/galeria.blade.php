@extends('premiacion.layout')





@section('title_section')
Galeria
@stop

@section('content_center')


@stop



@section('javacode')
<script type="text/javascript">

    // Running the code when the document is ready
    $(document).ready(function(){
     var bg="{{ URL::to('/img/background-premiacion_inside.jpg') }}";
     $(window).height();

        $('body').css({'background-image': 'url('+bg+')'});

    });

</script>
@stop