@extends('kids.layout')

@section('scripts')



{{ HTML::style('js/nivo/nivo-lightbox.css') }}
{{ HTML::style('js/nivo/themes/default/default.css') }}
{{ HTML::script('js/nivo/nivo-lightbox.min.js') }}
<!-- Optionally add helpers - button, thumbnail and/or media -->
@stop


@section('bg_move')
<div class="bg"></div>
<!--<div class="center_container ">

    <div class="column" style="height:100%">
        <div class="ui grid" style="height:100%">
            <div class="row" style="height:100%">

                <div class="three wide column"  style="height:100%">


                    <img  border="0" src="{{ URL::to('/img/kid.png') }}" style="position: fixed;bottom: 5%">



                </div>
                <div class="thirteen wide column ">

                </div>


            </div>
        </div>

    </div>
</div>-->
<div class="ui one column page grid bg_adition">
    <div class="center_container">
        <div class="column" style="height:100%">
            <div class="ui grid" style="height:100%">
                <div class="row" style="height:100%">

                    <div class="three wide column"  style="height:100%">


                        <img  border="0" src="{{ URL::to('/img/kid.png') }}" >



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
<!--<div class="hidden_cuento" id="cuento1" >
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


</div>-->

<div  class="resize_container resize_container_cuento">
<!--resize_contain-->

    @foreach($cuentos as $cuento)
            @if($count!=3)
            <div class="hidden_cuento" id="cuento{{$cuento->id}}" >
                <div class="cuento_first_wrap">
                    <div class="hidden_cuento_title"><h2 style="margin-top: 0;">{{$cuento->title}}</h2><h5>-{{$cuento->name}} {{$cuento->age}} años</h5></div>
                    <img height="100%" src="<?= URL::to('/cuentos_images/'.$cuento->images->first()->path)?>">
                </div>
                <div class="cuento_second_wrap">
                    <div class="cuento_second_wrap_title"><p>TRANSCRIPCION</p>
                        <p>{{$cuento->text}} </p>
                    </div>
                </div>
            </div>

            <div class="cuento_box">
                <div class="cuento_title">{{$cuento->title}}</div>
                <div class="cuento_by">{{$cuento->name}}</div>
                <div class="cuento_age">{{$cuento->age}} años</div>
                <a href="#cuento{{$cuento->id}}" data-lightbox-type="inline" data-lightbox-gallery="gallery1"  >
                    <div  data-id="{{$cuento->id}}" class="cuento_image" style="background-image:url('<?= URL::to('/cuentos_images/'.$cuento->images->first()->path)?>')" ></div>
                </a>
                <div class="ui grid">
                    <div class="row ">
                        <div class="eight wide column cuento_opciones"><img data-id="{{$cuento->id}}" data-status="inactive" class="cuento_like"
                            @if(Like::where('cuento_id','=',$cuento->id)->where('ip','=',Request::getClientIp())->first()) src="{{ URL::to('/img/likes_active.png') }}" @else src="{{ URL::to('/img/likes.png') }}" @endif >
                            <span class="number_likes">{{$cuento->likes->count()}}</span>
                        </div>
                        <div class="eight wide column cuento_opciones"><img src="{{ URL::to('/img/views.png') }}"><span class="number_views">{{$cuento->views->count()}}</span></div>
                    </div>
                </div>
            </div>

        @else
             <div style="width: 100%; height: 45px;float:left;"></div>

                <div class="hidden_cuento" id="cuento{{$cuento->id}}" >
                    <div class="cuento_first_wrap">
                        <div class="hidden_cuento_title"><h2 style="margin-top: 0;">{{$cuento->title}}</h2><h5>-{{$cuento->name}} {{$cuento->age}} años</h5></div>
                        <img height="100%" src="<?= URL::to('/cuentos_images/'.$cuento->images->first()->path)?> ">
                    </div>
                    <div class="cuento_second_wrap">
                        <div class="cuento_second_wrap_title"><p>TRANSCRIPCION</p>
                            <p>{{$cuento->text}} </p>
                        </div>
                    </div>
                </div>

                <div class="cuento_box">
                    <div class="cuento_title">{{$cuento->title}}</div>
                    <div class="cuento_by">{{$cuento->name}}</div>
                    <div class="cuento_age">{{$cuento->age}} años</div>
                    <a href="#cuento{{$cuento->id}}" data-lightbox-type="inline" data-lightbox-gallery="gallery1"  >
                        <div  data-id="{{$cuento->id}}" class="cuento_image" style="background-image:url('<?= URL::to('/cuentos_images/'.$cuento->images->first()->path)?>')"></div>
                    </a>
                    <div class="ui grid">
                        <div class="row ">
                            <div class="eight wide column cuento_opciones"><img data-id="{{$cuento->id}}" data-status="inactive" class="cuento_like"  @if(Like::where('cuento_id','=',$cuento->id)->where('ip','=',Request::getClientIp())->first()) src="{{ URL::to('/img/likes_active.png') }}" @else src="{{ URL::to('/img/likes.png') }}" @endif >
                                <span class="number_likes">{{$cuento->likes->count()}}</span>
                            </div>
                            <div class="eight wide column cuento_opciones"><img src="{{ URL::to('/img/views.png') }}"><span class="number_views">{{$cuento->views->count()}}</span></div>
                        </div>
                    </div>
                </div>
        @endif
    <?php $count+=1; ?>

    @endforeach
    <!--<div class="cuento_box">
        <div class="cuento_title">La Casa Azul</div>
        <div class="cuento_by">José Garcia</div>
        <div class="cuento_age">13 años</div>
        <a href="#cuento1" data-lightbox-type="inline" data-lightbox-gallery="gallery1"  ><div  data-id="1" class="cuento_image"></div></a>
        <div class="ui grid">
            <div class="row ">
                <div class="eight wide column cuento_opciones"><img data-id="1" data-status="inactive" class="cuento_like" src="{{ URL::to('/img/likes.png') }}"><span class="number_likes"> 153</span></div>
                <div class="eight wide column cuento_opciones"><img src="{{ URL::to('/img/views.png') }}"><span class="number_views"> 153</span></div>
            </div>
        </div>
    </div>

    <div class="cuento_box">
        <div class="cuento_title">La Casa Azul</div>
        <div class="cuento_by">José Garcia</div>
        <div class="cuento_age">13 años</div>
        <a href="#cuento1" data-lightbox-type="inline" data-lightbox-gallery="gallery1"  ><div  data-id="2" class="cuento_image"></div></a>
        <div class="ui grid">
            <div class="row ">
                <div class="eight wide column cuento_opciones"><img data-id="1" data-status="inactive" class="cuento_like" src="{{ URL::to('/img/likes.png') }}"><span class="number_likes"> 153</span></div>
                <div class="eight wide column cuento_opciones"><img src="{{ URL::to('/img/views.png') }}"><span class="number_views"> 153</span></div>
            </div>
        </div>
    </div>

    <div class="cuento_box">
        <div class="cuento_title">La Casa Azul</div>
        <div class="cuento_by">José Garcia</div>
        <div class="cuento_age">13 años</div>
        <a href="#cuento1" data-lightbox-type="inline" data-lightbox-gallery="gallery1"  ><div  data-id="3" class="cuento_image"></div></a>
        <div class="ui grid">
            <div class="row ">
                <div class="eight wide column cuento_opciones"><img data-id="1" data-status="inactive" class="cuento_like" src="{{ URL::to('/img/likes.png') }}"><span class="number_likes"> 153</span></div>
                <div class="eight wide column cuento_opciones"><img src="{{ URL::to('/img/views.png') }}"><span class="number_views"> 153</span></div>
            </div>
        </div>
    </div>

    <div class="cuento_box">
        <div class="cuento_title">La Casa Azul</div>
        <div class="cuento_by">José Garcia</div>
        <div class="cuento_age">13 años</div>
        <a href="#cuento1" data-lightbox-type="inline" data-lightbox-gallery="gallery1"  ><div  data-id="1" class="cuento_image"></div></a>
        <div class="ui grid">
            <div class="row ">
                <div class="eight wide column cuento_opciones"><img data-id="1" data-status="inactive" class="cuento_like" src="{{ URL::to('/img/likes.png') }}"><span class="number_likes"> 153</span></div>
                <div class="eight wide column cuento_opciones"><img src="{{ URL::to('/img/views.png') }}"><span class="number_views"> 153</span></div>
            </div>
        </div>
    </div>

    <div class="cuento_box">
        <div class="cuento_title">La Casa Azul</div>
        <div class="cuento_by">José Garcia</div>
        <div class="cuento_age">13 años</div>
        <a href="#cuento1" data-lightbox-type="inline" data-lightbox-gallery="gallery1"  ><div  data-id="1" class="cuento_image"></div></a>
        <div class="ui grid">
            <div class="row ">
                <div class="eight wide column cuento_opciones"><img data-id="1" data-status="inactive" class="cuento_like" src="{{ URL::to('/img/likes.png') }}"><span class="number_likes"> 153</span></div>
                <div class="eight wide column cuento_opciones"><img src="{{ URL::to('/img/views.png') }}"><span class="number_views"> 153</span></div>
            </div>
        </div>
    </div>

    <div class="cuento_box">
        <div class="cuento_title">La Casa Azul</div>
        <div class="cuento_by">José Garcia</div>
        <div class="cuento_age">13 años</div>
        <a href="#cuento1" data-lightbox-type="inline" data-lightbox-gallery="gallery1"  ><div  data-id="1" class="cuento_image"></div></a>
        <div class="ui grid">
            <div class="row ">
                <div class="eight wide column cuento_opciones"><img data-id="1" data-status="inactive" class="cuento_like" src="{{ URL::to('/img/likes.png') }}"><span class="number_likes"> 153</span></div>
                <div class="eight wide column cuento_opciones"><img src="{{ URL::to('/img/views.png') }}"><span class="number_views"> 153</span></div>
            </div>
        </div>
    </div>-->
    <!--end resize_contain-->
</div>

<div class="pagination_wrap">
    <!--<ul class="number_page" ><a href="#"><li><img src="{{ URL::to('/img/back.png') }}" ></li></a><a href="#"><li >1</li></a><a href="#"><li>2</li></a><a href="#"><li>3</li></a><a href="#"><li><img src="{{ URL::to('/img/next.png') }}" ></li></a></ul>-->
    {{$cuentos->links()}}
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








        $('body').on('click', '.cuento_like', function() {
            var urlaction="{{ URL::route('likeSystem') }}";
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
                        /*if(data=="añadido"){

                         objeto.attr('data-status','active');
                         objeto.find('img').attr('src',"{{ URL::to('/img/icons/love_active.png') }}");
                         }else{
                         objeto.attr('data-status','inactive');
                         objeto.find('img').attr('src',"{{ URL::to('/img/icons/love.png') }}");
                         }*/



                    },
                    error: function(jqXHR, textStatus, errorThrown)
                    {
                        //if fails
                        alert(errorThrown);
                    }
                });
        });







        $('body').on('click', '.cuento_image', function() {
            var urlaction="{{ URL::route('viewSystem') }}";

            var document_id=jQuery(this).attr('data-id');
            var objeto=jQuery(this);
            //alert(document_id);

            var number_views="";
            //alert(type);
            var parameters={document_id: document_id};
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

                        switch(data){
                            case 'añadido':



                                number_views=parseInt(objeto.parent().parent().find('.number_views').text());
                                number_views+=1;
                                objeto.parent().parent().find('.number_views').text(number_views);
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





        //$('.bg_adition').css({'background-image': 'url('+extra+')','background-position':'13% 93%','background-repeat':'no-repeat','background-size':'7%'});
    });

</script>
@stop