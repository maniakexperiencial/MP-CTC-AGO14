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


                    <a href="#video{{$video->id}}" data-lightbox-type="inline" data-lightbox-gallery="gallery1"  ><div class="video_box">
                            <div class="video_title">{{$video->title}}</div>
                            <div class="video_by">{{$video->name}}</div>
                            <div class="video_age">{{$video->age}} años</div>

                        </div></a>



            @endforeach
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

    });
</script>
@stop