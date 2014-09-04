@extends('admin.account.Admin.layout')

@section('scripts')
{{ HTML::style('css/jquery.fancybox.css', array('media' => 'screen')) }}
{{ HTML::script('js/jquery.fancybox.js') }}
{{ HTML::script('/js/custom/tables.js') }}
{{ HTML::script('/js/plugins/jquery.dataTables.min.js') }}
{{ HTML::script('http://code.jquery.com/jquery-latest.min.js') }}
{{ HTML::style('js/nivo/nivo-lightbox.css') }}
{{ HTML::style('js/nivo/themes/default/default.css') }}
{{ HTML::script('js/nivo/nivo-lightbox.min.js') }}
@stop

@section('content')
<div class="centercontent tables">
    <div class="pageheader notab">
        <h1 class="pagetitle">Cuentos<a href="{{URL::route('new_cuento')}}" class="btn_admin" style="float: right;">Subir Cuento</a></h1>
        <span class="pagedesc"></span>
        <div id="message_ajax"></div>
    </div><!--pageheader-->
    <div id="contentwrapper" class="contentwrapper">
        <div  class="cuentos_resize">


            <!--CUENTOS-->




            @foreach($cuentos as $cuento)

                        <div class="hidden_cuento" id="cuento<?= $cuento->id ?>" >
                            <div class="cuento_first_wrap">
                                <div class="hidden_cuento_title"><h2 style="margin-top: 0;">{{ $cuento->title }}</h2><h5>-{{ $cuento->name }} {{ $cuento->age }} años</h5></div>

                                <img height="100%" src="<?= URL::to('/cuentos_images/'.$cuento->images->first()->path)?>">
                            </div>
                            <div class="cuento_second_wrap">
                                <div class="cuento_second_wrap_title"><p>TRANSCRIPCION</p>
                                    <p>{{ $cuento->text }}</p>
                                </div>

                            </div>
                        </div>

                            <div class="cuento_box" id="{{ $cuento->id }}">
                                <div class="cuento_title">{{ $cuento->title }}</div>
                                <div class="cuento_by">{{ $cuento->name }}</div>
                                <div class="cuento_age">{{ $cuento->age }} años</div>
                                <div class="cuento_image" style="background-image:url('<?= URL::to('/cuentos_images/'.$cuento->images->first()->path)?>')"></div>
                                <div class="ui grid">
                                    <div class="row">
                                        <div class="eight wide column cuento_opciones"><img src="{{ URL::to('/img/likes.png') }}">{{$cuento->likes->count()}}</div>
                                        <div class="eight wide column cuento_opciones"><img src="{{ URL::to('/img/views.png') }}"></div>

                                    </div>
                                    <div class="row">
                                        <div class="cuento_admin_options"><a href="<?=URL::route('editcuento', ['idcuento' => $cuento->id] ) ?>">editar</a></div>
                                        <div class="cuento_admin_options"><a href="#" class="delete" data-id="<?= $cuento->id ?>">borrar</a></div>
                                        <div class="cuento_admin_options"><a href="#cuento<?= $cuento->id ?>" data-lightbox-type="inline" data-lightbox-gallery="gallery1"  >leer</a></div>

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

        jQuery('.delete').click(function(){

            var id_cuento=jQuery(this).data('id');
            var parameters={id_cuento: id_cuento};
            jQuery.ajax(
                {
                    url : "{{ URL::route('delete_cuento') }}",
                    type: "POST",
                    data : parameters,
                    success:function(data, textStatus, jqXHR)
                    {
                        //data: return data from server
                        //jQuery('.notab').append(data);
                        //alert(data);
                        jQuery('#'+id_cuento).hide();
                        jQuery('#message_ajax').fadeIn(200);
                        jQuery('#message_ajax').html(data);
                        setTimeout(function() {
                            // Do something after 5 seconds
                            jQuery('#message_ajax').fadeOut(200);
                        }, 2000);


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