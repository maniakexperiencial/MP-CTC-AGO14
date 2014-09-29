@extends('premiacion.layout')


@section('scripts')



{{ HTML::style('js/nivo/nivo-lightbox.css') }}
{{ HTML::style('js/nivo/themes/default/default.css') }}
{{ HTML::script('js/nivo/nivo-lightbox.min.js') }}



<!-- Optionally add helpers - button, thumbnail and/or media -->
@stop

@section('bg_move')
<div class="bg"></div>
<!--<div class="ui one column page grid bg_adition">-->
<div class="ui one column page grid bg_adition">
    <div class="center_container" >
        <div class="column" style="height:100%">
            <div class="ui grid" style="height:100%">
                <div class="row" style="height:100%">

                    <div class="three wide column"  style="height:100%">


                       <!-- <img  border="0" src="{{ URL::to('/img/copa.png') }}" >-->



                    </div>
                    <div class="thirteen wide column ">

                    </div>


                </div>
            </div>

        </div>
    </div>
</div>
@stop

@section('filter')
{{Form::select('selectbox', [''=>'Categoria','6-7'=>'6-7','8-12'=>'8-12','padres'=>'papas','doctores'=>'doctores'], null,['class'=>'signup_blue signup_select','id'=>'Selectbox'])}}
<!--<select id="Selectbox">
    <option value="" selected>Categoria</option>

    <option value="{{URL::to('papas/historias/papas')}}">papas</option>
    <option value="{{URL::to('papas/historias/doctores')}}">doctores</option>
</select>-->

@stop





@section('top_sidebar')
<img  src="{{ URL::to('/img/sol.png') }}">
@stop
@section('bottom_sidebar')
<!--<img class="invisible"  src="{{ URL::to('/img/copa.png') }}">-->
@stop


@section('title_section')
Ganadores
<img class="papalote" src="{{ URL::to('/img/papalote.png') }}">
@stop



@section('title_section')
Ganadores
@stop

@section('content_center')

    @if($winner1a)

        @if($type==0)
                        <div class="hidden_cuento" id="cuento{{$winner1a->id}}" >
                            <div class="cuento_first_wrap">
                                <div class="hidden_cuento_title"><h2 style="margin-top: 0;">{{$winner1a->title}}</h2><h4>{{$winner1a->state}}</h4><h5>-{{$winner1a->name}} {{$winner1a->age}} años</h5></div>

                                <img height="100%" id="img_central{{$winner1a->id}}" class="img_central{{$winner1a->id}}" src="<?= URL::to('/cuentos_images/'.$winner1a->images->first()->path)?>">
                                @if($winner1a->images->count()>1)
                                <div id="slider" class="slider" >
                                    <ul class="thumb_images_wrap">
                                        @foreach($winner1a->images as $image)

                                        <li><a ><img data-id="{{$winner1a->id}}" src="<?= URL::to('/cuentos_images/'.$image->path)?>" alt="Css Template Preview" /></a></li>


                                        @endforeach
                                    </ul>
                                </div>
                                @endif

                            </div>
                            <div class="cuento_second_wrap">
                                <div class="cuento_second_wrap_title"><p>TRANSCRIPCION</p>
                                    <p>{{ nl2br($winner1a->text) }}</p>
                                </div>
                            </div>
                        </div>
        @else

                    <div class="hidden_history" id="cuento{{$winner1a->id}}" >

                        <div class="hidden_history_title"><h2 style="margin-top: 0;">{{$winner1a->title}}</h2><h4>-{{$winner1a->name}}, {{$winner1a->state}}</h4></div>

                        <div class="hidden_history_content">
                            <p>{{nl2br($winner1a->text)}}</p>
                        </div>
                    </div>

        @endif
    <a href="#cuento{{$winner1a->id}}" data-lightbox-type="inline" data-lightbox-gallery="gallery1"  >
        <div class="ganador_box ganador_1">
            <div class="ganador_title">{{$winner1a->title}}</div>
            <div class="ganador_info">-{{$winner1a->name}}</div>
            @if($winner1a->age)
            <div class="ganador_age">{{$winner1a->age}} años</div>
            @endif
        </div>
    </a>
    @endif


    @if($winner2a)

                    @if($type==0)
                    <div class="hidden_cuento" id="cuento{{$winner2a->id}}" >
                        <div class="cuento_first_wrap">
                            <div class="hidden_cuento_title"><h2 style="margin-top: 0;">{{$winner2a->title}}</h2><h4>{{$winner2a->state}}</h4><h5>-{{$winner2a->name}} {{$winner2a->age}} años</h5></div>

                            <img height="100%" id="img_central{{$winner2a->id}}" class="img_central{{$winner2a->id}}" src="<?= URL::to('/cuentos_images/'.$winner2a->images->first()->path)?>">
                            @if($winner2a->images->count()>1)
                            <div id="slider" class="slider" >
                                <ul class="thumb_images_wrap">
                                    @foreach($winner2a->images as $image)

                                    <li><a ><img data-id="{{$winner2a->id}}" src="<?= URL::to('/cuentos_images/'.$image->path)?>" alt="Css Template Preview" /></a></li>


                                    @endforeach
                                </ul>
                            </div>
                            @endif

                        </div>
                        <div class="cuento_second_wrap">
                            <div class="cuento_second_wrap_title"><p>TRANSCRIPCION</p>
                                <p>{{ nl2br($winner2a->text) }}</p>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="hidden_history" id="cuento{{$winner2a->id}}" >

                        <div class="hidden_history_title"><h2 style="margin-top: 0;">{{$winner2a->title}}</h2><h4>-{{$winner2a->name}}, {{$winner2a->state}}</h4></div>

                        <div class="hidden_history_content">
                            <p>{{nl2br($winner2a->text)}}</p>
                        </div>
                    </div>
                    @endif
    <a href="#cuento{{$winner2a->id}}" data-lightbox-type="inline" data-lightbox-gallery="gallery1"  >
    <div class="ganador_box ganador_2">
        <div class="ganador_title">{{$winner2a->title}}</div>
        <div class="ganador_info">-{{$winner2a->name}}</div>
        @if($winner2a->age)
        <div class="ganador_age">{{$winner2a->age}} años</div>
        @endif
    </div>
    </a>
    @endif



    @if($winner3a)
                @if($type==0)
                <div class="hidden_cuento" id="cuento{{$winner3a->id}}" >
                    <div class="cuento_first_wrap">
                        <div class="hidden_cuento_title"><h2 style="margin-top: 0;">{{$winner3a->title}}</h2><h4>{{$winner3a->state}}</h4><h5>-{{$winner3a->name}} {{$winner3a->age}} años</h5></div>

                        <img height="100%" id="img_central{{$winner3a->id}}" class="img_central{{$winner3a->id}}" src="<?= URL::to('/cuentos_images/'.$winner3a->images->first()->path)?>">
                        @if($winner3a->images->count()>1)
                        <div id="slider" class="slider" >
                            <ul class="thumb_images_wrap">
                                @foreach($winner3a->images as $image)

                                <li><a ><img data-id="{{$winner3a->id}}" src="<?= URL::to('/cuentos_images/'.$image->path)?>" alt="Css Template Preview" /></a></li>


                                @endforeach
                            </ul>
                        </div>
                        @endif

                    </div>
                    <div class="cuento_second_wrap">
                        <div class="cuento_second_wrap_title"><p>TRANSCRIPCION</p>
                            <p>{{ nl2br($winner3a->text) }}</p>
                        </div>
                    </div>
                </div>
                @else
                <div class="hidden_history" id="cuento{{$winner3a->id}}" >

                    <div class="hidden_history_title"><h2 style="margin-top: 0;">{{$winner3a->title}}</h2><h4>-{{$winner3a->name}}, {{$winner3a->state}}</h4></div>

                    <div class="hidden_history_content">
                        <p>{{nl2br($winner3a->text)}}</p>
                    </div>
                </div>
                @endif

    <a href="#cuento{{$winner3a->id}}" data-lightbox-type="inline" data-lightbox-gallery="gallery1"  >
    <div class="ganador_box ganador_3">
        <div class="ganador_title">{{$winner3a->title}}</div>
        <div class="ganador_info">-{{$winner3a->name}}</div>
        @if($winner3a->age)
        <div class="ganador_age">{{$winner3a->age}} años</div>
        @endif
    </div>
    </a>
    @endif



<div style="width: 100%; height: 60px;float:left;"></div>



    @if($winner4a)
                @if($type==0)
                <div class="hidden_cuento" id="cuento{{$winner4a->id}}" >
                    <div class="cuento_first_wrap">
                        <div class="hidden_cuento_title"><h2 style="margin-top: 0;">{{$winner4a->title}}</h2><h4>{{$winner4a->state}}</h4><h5>-{{$winner4a->name}} {{$winner4a->age}} años</h5></div>

                        <img height="100%" id="img_central{{$winner4a->id}}" class="img_central{{$winner4a->id}}" src="<?= URL::to('/cuentos_images/'.$winner4a->images->first()->path)?>">
                        @if($winner4a->images->count()>1)
                        <div id="slider" class="slider" >
                            <ul class="thumb_images_wrap">
                                @foreach($winner4a->images as $image)

                                <li><a ><img data-id="{{$winner4a->id}}" src="<?= URL::to('/cuentos_images/'.$image->path)?>" alt="Css Template Preview" /></a></li>


                                @endforeach
                            </ul>
                        </div>
                        @endif

                    </div>
                    <div class="cuento_second_wrap">
                        <div class="cuento_second_wrap_title"><p>TRANSCRIPCION</p>
                            <p>{{ nl2br($winner4a->text) }}</p>
                        </div>
                    </div>
                </div>
                @else
                <div class="hidden_history" id="cuento{{$winner4a->id}}" >

                    <div class="hidden_history_title"><h2 style="margin-top: 0;">{{$winner4a->title}}</h2><h4>-{{$winner4a->name}}, {{$winner4a->state}}</h4></div>

                    <div class="hidden_history_content">
                        <p>{{nl2br($winner4a->text)}}</p>
                    </div>
                </div>
                @endif

    <a href="#cuento{{$winner4a->id}}" data-lightbox-type="inline" data-lightbox-gallery="gallery1"  >
    <div class="ganador_box ganador_4">
        <div class="ganador_title">{{$winner4a->title}}</div>
        <div class="ganador_info">-{{$winner4a->name}}</div>
        @if($winner4a->age)
        <div class="ganador_age">{{$winner4a->age}} años</div>
        @endif
    </div>
    </a>
    @endif




    @if($winner5a)
                @if($type==0)
                    <div class="hidden_cuento" id="cuento{{$winner5a->id}}" >
                        <div class="cuento_first_wrap">
                            <div class="hidden_cuento_title"><h2 style="margin-top: 0;">{{$winner5a->title}}</h2><h4>{{$winner5a->state}}</h4><h5>-{{$winner5a->name}} {{$winner5a->age}} años</h5></div>

                            <img height="100%" id="img_central{{$winner5a->id}}" class="img_central{{$winner5a->id}}" src="<?= URL::to('/cuentos_images/'.$winner5a->images->first()->path)?>">
                            @if($winner5a->images->count()>1)
                            <div id="slider" class="slider" >
                                <ul class="thumb_images_wrap">
                                    @foreach($winner5a->images as $image)

                                    <li><a ><img data-id="{{$winner5a->id}}" src="<?= URL::to('/cuentos_images/'.$image->path)?>" alt="Css Template Preview" /></a></li>


                                    @endforeach
                                </ul>
                            </div>
                            @endif

                        </div>
                        <div class="cuento_second_wrap">
                            <div class="cuento_second_wrap_title"><p>TRANSCRIPCION</p>
                                <p>{{ nl2br($winner5a->text) }}</p>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="hidden_history" id="cuento{{$winner5a->id}}" >

                        <div class="hidden_history_title"><h2 style="margin-top: 0;">{{$winner5a->title}}</h2><h4>-{{$winner5a->name}}, {{$winner5a->state}}</h4></div>

                        <div class="hidden_history_content">
                            <p>{{nl2br($winner5a->text)}}</p>
                        </div>
                    </div>
                @endif
    <a href="#cuento{{$winner5a->id}}" data-lightbox-type="inline" data-lightbox-gallery="gallery1"  >
    <div class="ganador_box ganador_5">
        <div class="ganador_title">{{$winner5a->title}}</div>
        <div class="ganador_info">-{{$winner5a->name}}</div>
        @if($winner5a->age)
        <div class="ganador_age">{{$winner5a->age}} años</div>
        @endif
    </div>
    </a>

    @endif



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
        var extra="{{ URL::to('/img/copa.png') }}";
     $(window).height();

        $('body').css({'background-image': 'url('+bg+')'});
        //$('#content_wrap').css({'background-image': 'url('+extra+')','background-position':'3% 100%','background-repeat':'no-repeat','background-size':'10%'});
       // $('.bg_adition').css({'background-image': 'url('+extra+')','background-position':'13% 100%','background-repeat':'no-repeat','background-size':'7%'});
        /*$('.Action_bar').hide();*/

        jQuery("#Selectbox").change(function () {

            location.href = "{{URL::to('premiacion/ganadores')}}"+"/"+jQuery(this).val();
        });


    });

</script>
@stop