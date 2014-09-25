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
                            <?php
                            $user_auth=Auth::user();
                            $preselect=Preselect::where('document_id','=',$historia->id)->where('type','=','1')->where('user_id','=',$user_auth->id)->first();
                            if($preselect)
                            {
                                echo "<div class='historia_option_wraphist historia_love' data-status=active data-id=$historia->id data-type=1>
                                <img src=".URL::to('/img/icons/love_active.png').">
                               </div>";
                            }else{
                                echo  "<div class='historia_option_wraphist historia_love' data-status=inactive data-id=$historia->id data-type=1>
                                <img src=".URL::to('/img/icons/loveh.png').">
                               </div>";
                            }
                            ?>
                                <!--<div  class="historia_option_wraphist historia_love" data-status=inactive data-id="{{$historia->id}}" data-type="1">
                                    <img  src="{{URL::to('/img/icons/loveh.png')}}">
                                </div>-->



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

        $('body').on('click', '.historia_love', function() {
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
                                objeto.find('img').attr('src',"{{ URL::to('/img/icons/loveh.png') }}");
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



        jQuery("#Selectbox").change(function () {
            location.href = "{{URL::to('dashboard_juez/historias')}}"+"/"+jQuery(this).val();
        });


    });
</script>
@stop