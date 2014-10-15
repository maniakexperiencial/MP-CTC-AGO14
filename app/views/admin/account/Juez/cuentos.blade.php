@extends('admin.account.Juez.layout')

@section('scripts')
{{ HTML::style('css/jquery.fancybox.css', array('media' => 'screen')) }}
{{ HTML::script('js/jquery.fancybox.js') }}
{{ HTML::script('/js/custom/tables.js') }}
{{ HTML::script('/js/plugins/jquery.dataTables.min.js') }}
{{ HTML::script('http://code.jquery.com/jquery-latest.min.js') }}
@stop





@section('content')
<div class="centercontent tables">
    <div class="pageheader notab">
        <h1 class="pagetitle">Cuentos</h1>
        <span class="pagedesc"></span>

       <div class="cuentoCategories"">
           <?php
           $states = array_merge(array('3'=>'Estado'),State::lists('state','state'));
           $selection=0;
           ?>
           @if($cuentos->count()!=0)
           @foreach($cuentos as $cuento)
           <?php $selection=$cuento->state ?>
           @endforeach
           @endif

           {{ Form::open(['route' => 'juez_cuentos_filter']) }}

           {{Form::select('state', $states, null,['class'=>'select_filter','id'=>'Selectbox'])}}
           <select id="SelectCategory" name="category" class="select_filter">
               <option value="" selected>Categoria</option>
               <!--<option value="{{URL::to('kids/cuentos/6')}}">6-7</option>
               <option value="{{URL::to('kids/cuentos/8')}}">8-12</option>-->
               <option value="6-7">6-7</option>
               <option value="8-12">8-12</option>


           </select>
           <input type="submit" class="btn_blue" value="Buscar">
           {{Form::close()}}
           <!--<select id="Selectbox">
               <option value="" selected>Categoria</option>
               <option value="{{URL::to('kids/cuentos/6')}}">6-7</option>
               <option value="{{URL::to('kids/cuentos/8')}}">8-12</option>

           </select>-->
       </div>



    </div><!--pageheader-->
    <div id="contentwrapper" class="contentwrapper">
        <!--CUENTOS-->
        <div  class="cuentos_resize">

        @foreach($cuentos as $cuento)

        <div class="hidden_cuento" id="cuento<?= $cuento->id ?>" >
            <div class="cuento_first_wrap">
                <div class="hidden_cuento_title"><h2 style="margin-top: 0;">{{ $cuento->title }}</h2><h5>{{$cuento->state}}</h5><h5>-{{ $cuento->name }} {{ $cuento->age }} años</h5></div>

                <img height="100%" id="img_central{{$cuento->id}}" class="img_central{{$cuento->id}}" src="<?= URL::to('/cuentos_images/'.$cuento->images->first()->path)?>">
                @if($cuento->images->count()>1)
                <div id="slider" class="slider" >
                    <ul class="thumb_images_wrap">
                        @foreach($cuento->images as $image)

                        <li><a ><img data-id="{{$cuento->id}}" src="<?= URL::to('/cuentos_images/'.$image->path)?>" alt="Css Template Preview" /></a></li>


                        @endforeach
                    </ul>
                </div>
                @endif

            </div>
            <div class="cuento_second_wrap">
                <div class="cuento_second_wrap_title"><p>TRANSCRIPCION</p>
                    <p>{{ nl2br($cuento->text) }}</p>

                </div>

            </div>
        </div>

        <div class="cuento_box2" id="{{ $cuento->id }}">
            <div class="cuento_title">{{ $cuento->title }}</div>
            <div class="cuento_by">{{ $cuento->name }}</div>
            <div class="cuento_age">{{ $cuento->age }} años, {{$cuento->state}}</div>
            <a href="#cuento<?= $cuento->id ?>" data-lightbox-type="inline" data-lightbox-gallery="gallery1"  >
                <div class="cuento_image" data-id="<?= $cuento->id ?>" style="background-image:url('<?= URL::to('/cuentos_images/'.$cuento->images->first()->path)?>')">
                    <img src="<?= URL::to('/cuentos_images/'.$cuento->images->first()->path)?>" alt="Css Template Preview" />
                    <?php
                    $user_auth=Auth::user();
                    $cuentoRead=CuentoRead::where('user_id','=',$user_auth->id)->where('cuento_id','=',$cuento->id)->first();
                    if($cuentoRead){
                        echo "<div class=mark_read>Leido</div>";
                    }else{

                    }
                    ?>

                </div>
            </a>
            <div class="ui grid">
                <div class="row">
                    <div class="eight wide column cuento_opciones2"><img src="{{ URL::to('/img/likes.png') }}"><span>{{count($cuento->likes)}}</span></div>
                    <div class="eight wide column cuento_opciones2"><img src="{{ URL::to('/img/views.png') }}"><span>{{count($cuento->likes)}}</span></div>
                    <?php
                    $user_auth=Auth::user();
                    $preselect=Preselect::where('document_id','=',$cuento->id)->where('type','=','0')->where('user_id','=',$user_auth->id)->first();
                    if($preselect)
                    {
                        echo "<div class='eight wide column cuento_love' data-status=active data-id=$cuento->id data-type=0>
                                <img src=".URL::to('/img/icons/love_active.png').">
                               </div>";
                    }else{
                        echo  "<div class='eight wide column cuento_love' data-status=inactive data-id=$cuento->id data-type=0>
                                <img src=".URL::to('/img/icons/love.png').">
                               </div>";
                    }

                    ?>





                    <!--<div class="eight wide column cuento_love" data-status="" data-id="{{ $cuento->id }}" data-type="0"><img src="{{ URL::to('/img/icons/love.png') }}"></div>-->

                </div>

            </div>
        </div>


        @endforeach

            <div class="pagination_wrap">
                {{$cuentos->links();}}
            </div>

    </div>

    </div><!--contentwrapper-->
</div><!-- centercontent -->
@stop

@section('jscode')
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('#m_cuentos').addClass('active');

        //LIGHTBOX//
        jQuery('a').nivoLightbox({
            afterShowLightbox: function(lightbox){
            }
        });


        $('body').on('click', '.cuento_love', function() {
            var urlaction="";
            var objeto=jQuery(this);
            var document_id=objeto.data('id');
            var status1=objeto.attr('data-status');
            var type=objeto.data('type');
            //alert(type);
            var parameters={document_id: document_id,type: type};
            if(status1 =="inactive"){
                urlaction="{{ URL::route('preselectAdd') }}";

            }else{
                urlaction="{{ URL::route('preselectDelete') }}";

            }

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
                                objeto.find('img').attr('src',"{{ URL::to('/img/icons/love_active.png') }}");
                                break;
                            case 'eliminado':
                                objeto.attr('data-status','inactive');
                                objeto.find('img').attr('src',"{{ URL::to('/img/icons/love.png') }}");
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


        $('body').on('click', '.thumb_images_wrap img', function() {

            var doc_id=$(this).attr('data-id');

            var src=$(this).attr('src');
            $('.img_central'+doc_id).attr('src',src);
        });


        //////////////CUENTO READ ////////////////////////


        $('body').on('click', '.cuento_image', function() {
            var urlaction="{{ URL::route('cuentoRead') }}";

            var document_id=jQuery(this).attr('data-id');
            var objeto=jQuery(this);
            //alert(document_id);

            //alert(type);
            var parameters={cuento_id: document_id};
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
                        /*alert(data);*/

                        switch(data){
                            case 'markIt':


                                objeto.html('<div class=mark_read>Leido</div>');
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