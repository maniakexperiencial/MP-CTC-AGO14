@extends('admin.account.Admin.layout')

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
        <h1 class="pagetitle">Historias</h1>
        <span class="pagedesc"></span>
        <?php
        $states = array_merge(array('3'=>'selecciona'),State::lists('state','state'));
        $selection=0;
        ?>
        {{Form::select('selectbox', [''=>'Categoria','padres'=>'padres','doctores'=>'doctores','todos'=>'todos'], null,['class'=>'select_filter','id'=>'Selectbox'])}}
        <div id="message_ajax"></div>
    </div><!--pageheader-->
    <div id="contentwrapper" class="contentwrapper">
        <div class="resize_container">
        <div id="pizarron_historias">
            <!--HISTORIAS-->

                @foreach($historias as $historia)
                            <div class="hidden_history" id="historia<?= $historia->id ?>" >
                                <div class="hidden_history_title"><h2 style="margin-top: 0;">{{$historia->title}}</h2><h4>-{{$historia->name}}, {{$historia->state}}</h4></div>

                                <div class="hidden_history_content">
                                    {{nl2br($historia->text)}}
                                </div>
                            </div>


                            <div class="historia_box" id="h<?= $historia->id ?>">
                                <a href="#historia<?= $historia->id ?>" data-lightbox-type="inline" data-lightbox-gallery="gallery1"  ><div class="historia_title">{{$historia->title}}</div></a>
                                <div class="historia_info">
                                    - {{$historia->name}}, {{$historia->state}}

                                </div>
                                <div  class="historia_option_wrap">
                                    <div class="cuento_admin_options"><a href="<?=URL::route('edithistoria',['idhistoria' => $historia->id] ) ?>">editar</a></div>
                                    <div class="cuento_admin_options"><a href="#" class="delete" data-id="<?= $historia->id ?>">borrar</a></div>
                                    <a href="#historia<?= $historia->id ?>" data-lightbox-type="inline" data-lightbox-gallery="gallery1" style="color: inherit;"> <div class="cuento_admin_options">leer</div></a>
                                </div>
                            </div>


                @endforeach



            </div>
            <div class="pagination_wrap">
                {{$historias->links();}}
            </div>
            </div>
    </div><!--contentwrapper-->
</div><!-- centercontent -->
@stop

@section('jscode')
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('#m_historias').addClass('active');

        jQuery('a').nivoLightbox({
            afterShowLightbox: function(lightbox){
            }
        });

        jQuery('.delete').click(function(){

            var id_historia=jQuery(this).data('id');
            var parameters={id_historia: id_historia};


            alertify.confirm("Borrar historia?", function (e) {
                if (e) {
                    // user clicked "ok"
                    jQuery.ajax(
                        {
                            url : "{{ URL::route('delete_historia') }}",
                            type: "POST",
                            data : parameters,
                            success:function(data, textStatus, jqXHR)
                            {
                                //data: return data from server
                                //jQuery('.notab').append(data);
                                //alert(data);
                                jQuery('#h'+id_historia).hide();
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

                } else {
                    // user clicked "cancel"
                    return false;
                }
            });



        });


        jQuery("#Selectbox").change(function () {
            location.href = "{{URL::to('historias_admin')}}"+"/"+jQuery(this).val();
        });

    });
</script>
@stop