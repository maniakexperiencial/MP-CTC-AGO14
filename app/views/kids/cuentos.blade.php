@extends('kids.layout')

@section('scripts')



{{ HTML::style('js/nivo/nivo-lightbox.css') }}
{{ HTML::style('js/nivo/themes/default/default.css') }}
{{ HTML::script('js/nivo/nivo-lightbox.min.js') }}
<!-- Optionally add helpers - button, thumbnail and/or media -->
@stop


@section('bg_move')
<div class="bg"></div>
<div class="bg_adition">

</div>
@stop


@section('top_sidebar')
<img  src="{{ URL::to('/img/sol.png') }}">
@stop
@section('bottom_sidebar')
<img class="invisible"  src="{{ URL::to('/img/kid.png') }}">
@stop



@section('left_menu')
<a href="{{ URL::route('kids_cuentos') }}"><img src="{{ URL::to('/img/cuentos.jpg') }}"></a>
<a href="{{ URL::route('kids_videos') }}"><img src="{{ URL::to('/img/video.jpg') }}"></a>
<a href="{{ URL::route('kids') }}"><img src="{{ URL::to('/img/bases.jpg') }}"></a>
@stop


@section('title_section')
Cuentos
<img class="papalote" src="{{ URL::to('/img/papalote.png') }}">
@stop

@section('content_center')
<div class="hidden_cuento" id="cuento1" >
    <div class="cuento_first_wrap">
        <div class="hidden_cuento_title"><h2 style="margin-top: 0;">Titulo del Cuento</h2><h5>-Jose García 13 años</h5></div>
        <img height="100%" src="{{ URL::to('/img/cuentos_examples/cuento_lightbox.jpg') }}">
    </div>
    <div class="cuento_second_wrap">
       <div class="cuento_second_wrap_title"><p>TRANSCRIPCION</p>
           <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, </p>
       </div>

    </div>


</div>
<div class="hidden_cuento" id="cuento2" >
    <div class="cuento_first_wrap">
        <div class="hidden_cuento_title"><h2 style="margin-top: 0;">Titulo del Cuento</h2><h5>-Jose García 13 años</h5></div>
        <img height="100%" src="{{ URL::to('/img/cuentos_examples/cuento_lightbox.jpg') }}">
    </div>
    <div class="cuento_second_wrap">
        <div class="cuento_second_wrap_title"><p>123123123</p>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, </p>
        </div>

    </div>


</div>


<a href="#cuento1" data-lightbox-type="inline" data-lightbox-gallery="gallery1"  >    <div class="cuento_box">
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
</a>

<a href="#cuento2" data-lightbox-type="inline" data-lightbox-gallery="gallery1"  >    <div class="cuento_box">
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
</a>
<a href="#cuento1" data-lightbox-type="inline" data-lightbox-gallery="gallery1"  >    <div class="cuento_box">
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
</a>

<a href="#cuento1" data-lightbox-type="inline" data-lightbox-gallery="gallery1"  >    <div class="cuento_box">
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
</a>

<a href="#cuento1" data-lightbox-type="inline" data-lightbox-gallery="gallery1"  >    <div class="cuento_box">
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
</a>



<div class="pagination_wrap">
    <ul class="number_page" ><a href="#"><li><img src="{{ URL::to('/img/back.png') }}" ></li></a><a href="#"><li >1</li></a><a href="#"><li>2</li></a><a href="#"><li>3</li></a><a href="#"><li><img src="{{ URL::to('/img/next.png') }}" ></li></a></ul>
</div>

@stop



@section('javacode')
<script type="text/javascript">

    // Running the code when the document is ready
    $(document).ready(function(){

        $('a').nivoLightbox({
            afterShowLightbox: function(lightbox){



            }
        });

     var bg="{{ URL::to('/img/bg_land.jpg') }}";
     $(window).height();
        var extra="{{ URL::to('/img/kid.png') }}";
        //$('#content_wrap').css({'background-image': 'url('+extra+')','background-position':'2% 100%','background-repeat':'no-repeat','background-size':'12%'});
        $('body').css({'background-image': 'url('+bg+')'});

        $('.bg_adition').css({'background-image': 'url('+extra+')','background-position':'13% 93%','background-repeat':'no-repeat','background-size':'7%'});
    });

</script>
@stop