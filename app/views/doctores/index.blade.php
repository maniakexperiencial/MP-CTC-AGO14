@extends('doctores.layout')





@section('title_section')

@stop



@section('javacode')
<script type="text/javascript">

    // Running the code when the document is ready
    $(document).ready(function(){
        var bg="{{ URL::to('/img/background-doctores.jpg') }}";
        $(window).height();

        $('body').css({'background-image': 'url('+bg+')'});

    });

</script>
@stop