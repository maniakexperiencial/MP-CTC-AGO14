@extends('papas.layout')

@section('scripts')



{{ HTML::style('js/nivo/nivo-lightbox.css') }}
{{ HTML::style('js/nivo/themes/default/default.css') }}
{{ HTML::script('js/nivo/nivo-lightbox.min.js') }}
<!-- Optionally add helpers - button, thumbnail and/or media -->
@stop

@section('filter')
<?php
$states = array_merge(array('3'=>'selecciona'),State::lists('state','state'));
$selection=0;
?>
@if($historias->count()!=0)
@foreach($historias as $historia)
<?php $selection=$historia->state ?>
@endforeach
@endif

{{Form::select('selectbox', $states, null,['class'=>'signup_blue signup_select','id'=>'Selectbox'])}}

<!--<select id="Selectbox">
    <option value="" selected>Categoria</option>

    <option value="{{URL::to('papas/historias/papas')}}">papas</option>
    <option value="{{URL::to('papas/historias/doctores')}}">doctores</option>
</select>-->
@stop

@section('bg_move')
<div class="bg"></div>
<div class="ui one column page grid bg_adition">
    <div class="center_container">
        <div class="column" style="height:100%">
            <div class="ui grid" style="height:100%">
                <div class="row" style="height:100%">

                    <div class="three wide column"  style="height:100%">


                        <img  border="0" src="{{ URL::to('/img/papas.png') }}" >



                    </div>
                    <div class="thirteen wide column ">

                    </div>


                </div>
            </div>

        </div>
    </div>
</div>
@stop


@section('top_sidebar')
<img  src="{{ URL::to('/img/sol.png') }}">
@stop
@section('bottom_sidebar')
<img class="invisible"  src="{{ URL::to('/img/papas.png') }}">
@stop


@section('title_section')
Historias
<img class="papalote" src="{{ URL::to('/img/papalote.png') }}">
@stop

@section('content_center')
<div  class="resize_container">
    <!--resize_contain-->
<div class="ui grid" id="pizarron_historias">
<div class="row">
    <div class="sixteen wide column">
        @foreach($historias as $historia)
                    <div class="hidden_history" id="historia{{$historia->id}}" >

                        <div class="hidden_history_title"><h2 style="margin-top: 0;">{{$historia->title}}</h2><h4>-{{$historia->name}}, {{$historia->state}}</h4></div>

                        <div class="hidden_history_content">
                            <p>{{nl2br($historia->text)}}</p>
                        </div>
                    </div>

                        <div class="historia_box">
                            <a href="#historia{{$historia->id}}" data-id="{{$historia->id}}" data-lightbox-type="inline" data-lightbox-gallery="gallery1" class="view_click"  >
                            <div class="historia_title">{{$historia->title}}</div>
                            <div class="historia_info">
                                -{{$historia->name}}, {{$historia->state}}

                            </div>
                            </a>
                            <div class="historia_likeview_wrap">
                                <?php
                                    $cookieName = "likeH_".$historia->id;
                                    //dd($_COOKIE[$cookieName]);
                                ?>
                                <img style="max-height: 16px" data-id="{{$historia->id}}" data-status="inactive" class="historia_like"

                                    <?php
                                    if(isset($_COOKIE[$cookieName])){
                                        echo "src='".URL::to('/img/likes_active.png')."'";
                                    }else{
                                        echo "src='".URL::to('/img/likesh.png')."'";
                                    }
                                    ?>

                                    >
                                <span class="number_likes">{{$historia->likes->count()}}</span>
                                <img style="max-height: 16px"  data-status="inactive" class="historia_view"
                                    <?php
                                    echo "src='".URL::to('/img/viewsh.png')."'";
                                    ?>
                                    >
                                <span class="number_views">{{$historia->views->count()}}</span>
                            </div>

                        </div>



        @endforeach
        <!--<div class="hidden_history" id="historia2" >
            <div class="hidden_history_title"><h2 style="margin-top: 0;">Titulo del Cuento</h2><h4>-Jose García 13 años</h4></div>

            <div class="hidden_history_content">
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec,</p>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec,</p>
            </div>
        </div>

        <a href="#historia2" data-lightbox-type="inline" data-lightbox-gallery="gallery1"  >
            <div class="historia_box">
                        <div class="historia_title">Titulo del Cuento</div>
                        <div class="historia_info">
                            -Jose Luis,13

                        </div>
                </div>
         </a>

        <a href="#historia2" data-lightbox-type="inline" data-lightbox-gallery="gallery1"  >
            <div class="historia_box">
                <div class="historia_title">Titulo del Cuento</div>
                <div class="historia_info">
                    -Jose Luis,13

                </div>
            </div>
        </a>
        <a href="#historia2" data-lightbox-type="inline" data-lightbox-gallery="gallery1"  >
            <div class="historia_box">
                <div class="historia_title">Titulo del Cuento</div>
                <div class="historia_info">
                    -Jose Luis,13

                </div>
            </div>
        </a>
        <a href="#historia2" data-lightbox-type="inline" data-lightbox-gallery="gallery1"  >
            <div class="historia_box">
                <div class="historia_title">Titulo del Cuento</div>
                <div class="historia_info">
                    -Jose Luis,13

                </div>
            </div>
        </a>-->

    </div>
</div>
</div>
    <!--end resize_contain-->
</div>
<div class="pagination_wrap" style="margin:0px;">
    <!--<ul class="number_page" ><a href="#"><li><img src="{{ URL::to('/img/back.png') }}" ></li></a><a href="#"><li >1</li></a><a href="#"><li>2</li></a><a href="#"><li>3</li></a><a href="#"><li><img src="{{ URL::to('/img/next.png') }}" ></li></a></ul>-->
    {{$historias->links()}}
</div>
@stop



@section('javacode')
<script type="text/javascript">

    // Running the code when the document is ready
    $(document).ready(function(){

        $('a').nivoLightbox();

        var bg="{{ URL::to('/img/bg_land.jpg') }}";
        var bgcontent="{{ URL::to('/img/pizarron2.png') }}";
     $(window).height();
        var extra="{{ URL::to('/img/papas.png') }}";
        //$('.bg_adition').css({'background-image': 'url('+extra+')','background-position':'13% 93%','background-repeat':'no-repeat','background-size':'9%'});
        $('body').css({'background-image': 'url('+bg+')'});
        $('#pizarron_historias').css({'background-image': 'url('+bgcontent+')'});

        //alert($('#pizarron_historias').width());
        //alert($(window).height());
       // alert($('.historia_box').height());
        $(window).resize(function() {
            //$('.historia_box').css('min-height',$(window).height()*.1532175) ;
            //$('.historia_box').css('height',$(window).height()*.1532175) ;
            $('#Left_bar img').css('max-height',$(window).height()*.14629049);
        });


       // $('.historia_box').css('min-height',$(window).height()*.1532175) ;
       //
        $('#Left_bar img').css('max-height',$(window).height()*.14629049);


        jQuery("#Selectbox").change(function () {
            location.href = "{{URL::to('papas/historias')}}"+"/"+jQuery(this).val();
        });


        ///////////LIKES////////////
        $('body').on('click', '.historia_like', function() {
            var urlaction="{{ URL::route('likeSystemH') }}";
            var objeto=jQuery(this);
            var document_id=objeto.data('id');

            var status1=objeto.attr('data-status');
            var numero_likes="";
            //alert(type);
            var parameters={document_id: document_id,status1: status1};
            //alert(status1+document_id);

            jQuery.ajax(
                {
                    url : urlaction,
                    type: "POST",
                    data : parameters,
                    success:function(data, textStatus, jqXHR)
                    {
                        //data: return data from server
                        //jQuery('.notab').append(data);
                        //alert(data);
                        console.log(data);
                        switch(data){
                            case 'añadido':
                                objeto.attr('data-status','active');
                                objeto.attr('src',"{{ URL::to('/img/likes_active.png') }}");
                                numero_likes=parseInt(objeto.parent().find('.number_likes').text());
                                numero_likes+=1;
                                objeto.parent().find('.number_likes').text(numero_likes);
                                break;
                            case 'eliminado':
                                objeto.attr('data-status','inactive');
                                objeto.attr('src',"{{ URL::to('/img/likes.png') }}");
                                numero_likes=parseInt(objeto.parent().find('.number_likes').text());
                                if(numero_likes==0){

                                }else{
                                    numero_likes-=1;
                                    objeto.parent().find('.number_likes').text(numero_likes);
                                }
                                break;
                            default:
                                break;
                        }



                    },
                    error: function(jqXHR, textStatus, errorThrown)
                    {
                        //if fails
                        alert(errorThrown);
                    }
                });
        });


        ////////////////////////////HISTORIAS VIEWS///////////////
        $('body').on('click', '.view_click', function() {
           /*alert('entro');*/
            var urlaction="{{ URL::route('viewSystemH') }}";

            var document_id=jQuery(this).attr('data-id');
            var objeto=jQuery(this);
            //alert(document_id);

            var number_views="";
            //alert(type);
            var parameters={document_id: document_id};

            jQuery.ajax(
                {
                    url : urlaction,
                    type: "POST",
                    data : parameters,
                    success:function(data, textStatus, jqXHR)
                    {
                        //data: return data from server
                        //jQuery('.notab').append(data);
                        /*alert(data);*/

                        switch(data){
                            case 'añadido':



                                number_views=parseInt(objeto.parent().find('.number_views').text());
                                number_views+=1;
                                objeto.parent().find('.number_views').text(number_views);
                                break;

                            default:
                                break;
                        }




                    },
                    error: function(jqXHR, textStatus, errorThrown)
                    {
                        //if fails
                        alert(errorThrown);
                    }
                });
        });










    });

</script>
@stop