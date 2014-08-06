@extends('doctores.layout')




@section('title_section')
Historias
@stop

@section('content_center')
<div class="ui grid" id="pizarron_historias">
<div class="row">
    <div class="sixteen wide column">
                <div class="historia_box">
                        <div class="historia_title">Titulo del Cuento</div>
                        <div class="historia_info">
                            -Jose Luis,13

                        </div>
                </div>
                <div class="historia_box">
                    <div class="historia_title">Titulo del Cuento</div>
                    <div class="historia_info">
                        -Jose Luis,13

                    </div>
                </div>
                <div class="historia_box">
                    <div class="historia_title">Titulo del Cuento</div>
                    <div class="historia_info">
                        -Jose Luis,13

                    </div>
                </div>
                <div class="historia_box">
                    <div class="historia_title">Titulo del Cuento</div>
                    <div class="historia_info">
                        -Jose Luis,13

                    </div>
                </div>
    </div>
</div>
</div>

@stop



@section('javacode')
<script type="text/javascript">

    // Running the code when the document is ready
    $(document).ready(function(){
        var bg="{{ URL::to('/img/background-doctores_inside.jpg') }}";
        var bgcontent="{{ URL::to('/img/pizarron2.png') }}";
     $(window).height();

        $('body').css({'background-image': 'url('+bg+')'});
        $('#pizarron_historias').css({'background-image': 'url('+bgcontent+')'});

    });

</script>
@stop