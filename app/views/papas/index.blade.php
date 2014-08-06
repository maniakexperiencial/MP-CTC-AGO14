@extends('papas.layout')





@section('title_section')

@stop



@section('javacode')
<script type="text/javascript">

    // Running the code when the document is ready
    $(document).ready(function(){
        var bg="{{ URL::to('/img/background-papas.jpg') }}";
        $(window).height();

        $('body').css({'background-image': 'url('+bg+')'});

    });

</script>
@stop