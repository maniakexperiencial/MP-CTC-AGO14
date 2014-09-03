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
    </div><!--pageheader-->
    <div id="contentwrapper" class="contentwrapper">
        <!--CUENTOS-->
        @foreach($users as $user)

        @foreach($user->cuentos as $cuento)

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

        <div class="cuento_box2" id="{{ $cuento->id }}">
            <div class="cuento_title">{{ $cuento->title }}</div>
            <div class="cuento_by">{{ $cuento->name }}</div>
            <div class="cuento_age">{{ $cuento->age }} años</div>
            <a href="#cuento<?= $cuento->id ?>" data-lightbox-type="inline" data-lightbox-gallery="gallery1"  >
                <div class="cuento_image" style="background-image:url('<?= URL::to('/cuentos_images/'.$cuento->images->first()->path)?>')"></div>
            </a>
            <div class="ui grid">
                <div class="row">
                    <div class="eight wide column cuento_opciones2"><img src="{{ URL::to('/img/likes.png') }}">153</div>
                    <div class="eight wide column cuento_opciones2"><img src="{{ URL::to('/img/views.png') }}">2547</div>
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
        @endforeach


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



    });
</script>
@stop