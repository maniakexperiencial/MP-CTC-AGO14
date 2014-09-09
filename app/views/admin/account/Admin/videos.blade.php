@extends('admin.account.Admin.layout')

@section('scripts')



{{ HTML::script('http://code.jquery.com/jquery-latest.min.js') }}


{{ HTML::style('//cdn.datatables.net/1.10.2/css/jquery.dataTables.css', array('media' => 'screen')) }}
{{ HTML::script('http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js') }}

{{ HTML::style('css/plugins/styledataTables.css', array('media' => 'screen')) }}






@stop

@section('content')
<div class="centercontent tables">
    <div class="pageheader notab">
        <h1 class="pagetitle">Videos<a href="{{URL::route('new_video')}}" class="btn_admin" style="float: right;">Subir Video</a></h1>
        <span class="pagedesc"></span>
        <div id="message_ajax"></div>
    </div><!--pageheader-->
    <div id="contentwrapper" class="contentwrapper">
       <!-- <div id="dyntable_length" class="dataTables_length table_blue">
            <label>
                Mostrar
                <select size="1" name="dyntable_length">
                    <option value="10" selected="selected">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select> entradas
            </label>
        </div>-->
        <div  class="resize_container">
            <!--resize_contain-->
            @foreach($videos as $video)

                    <div class="hidden_video" id="video{{$video->id}}" >
                        <div class="hidden_video_title"><h2 style="margin-top: 0;">{{$video->title}}</h2><h5>-{{$video->name}} {{$video->age}} años</h5></div>
                        <iframe style="min-height:70%; width:70%;height:300px;margin: auto;"  src="//www.youtube.com/embed/{{$video->code}}" frameborder="0" allowfullscreen></iframe>


                    </div>


                    <div class="video_box" id="v<?= $video->id ?>">
                            <div class="video_title">{{$video->title}}</div>
                            <div class="video_by">{{$video->name}}</div>
                            <div class="video_age">{{$video->age}} años</div>
                            <div  class="video_option_wrap">
                                <div class="video_admin_options"><a href="<?=URL::route('edit_video',['idvideo' => $video->id] ) ?>">editar</a></div>
                                <div class="video_admin_options" ><a href="#" class="delete" data-id="{{$video->id}}">borrar</a></div>
                                <a href="#video{{$video->id}}" data-lightbox-type="inline" data-lightbox-gallery="gallery1"  ><div class="video_admin_options">Ver</div></a>
                            </div>
                    </div>



            @endforeach
            <div class="pagination_wrap">
                {{$videos->links()}}
            </div>
       </div>


    </div><!--contentwrapper-->
</div><!-- centercontent -->
@stop

@section('jscode')
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('#m_videos').addClass('active');


        //LIGHTBOX//
        jQuery('a').nivoLightbox({
            afterShowLightbox: function(lightbox){

            }
        });

        $('#table_preselect').dataTable( {
            "language": {
                "lengthMenu": "Mostrar _MENU_ entradas",
                "zeroRecords": "Ningun resultado - lo sentimos",
                "info": "Mostrando _PAGE_ de _PAGES_",
                "infoEmpty": "Registros no disponibles",
                "infoFiltered": "(filtered from _MAX_ total records)"
            },
            "lengthMenu": [[5, 25, 50, -1], [5, 25, 50, "All"]]
        } );
        /*$('#table_preselect').dataTable( {
            "pagingType": "full_numbers"
        } );*/


        jQuery('.delete').click(function(){

            var id_video=jQuery(this).data('id');
            var parameters={id_video: id_video};


            alertify.confirm("Borrar video?", function (e) {
                if (e) {
                    // user clicked "ok"
                    jQuery.ajax(
                        {
                            url : "{{ URL::route('delete_video') }}",
                            type: "POST",
                            data : parameters,
                            success:function(data, textStatus, jqXHR)
                            {
                                //data: return data from server
                                //jQuery('.notab').append(data);
                                //alert(data);
                                jQuery('#v'+id_video).hide();
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

    });
</script>
@stop