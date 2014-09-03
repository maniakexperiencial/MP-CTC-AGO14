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
        <h1 class="pagetitle">Preseleccionados</h1>
        <span class="pagedesc"><?php if($type==0){ echo "Cuentos";}else{ echo "Historias";} ?></span>
    </div><!--pageheader-->
    <div id="contentwrapper" class="contentwrapper" style="width:60%;min-width: 640px;">

        <table cellpadding="0" cellspacing="0" border="0" class="stdtable stdtablequick table_blue" >
            <!--<colgroup>
                <col class="con0" />
                <col class="con1" />
                <col class="con0" />
                <col class="con1" />
                <col class="con0" />
                <col class="con1" />
            </colgroup>-->
            <thead>
            <tr>

                <th class="t_white">Nombre del Juez</th>
                <th class="t_white">Categoria</th>
                <th class="t_white">Contenido</th>
                <th class="t_white">Originalidad</th>
                <th class="t_white">Mensaje</th>
                <th class="t_white">Promedio</th>
            </tr>
            </thead>
            <tbody>


            <?php
            if($type==0){
                //////////IF TYPE=0/////
                $preselects=Preselect::where('document_id','=',$document_id)->where('status','=','1')->where('type','=','0')->get();

                $cuento=Cuento::where('id','=',$document_id)->first();
                echo "<div class='preselect_detail_info'>
                '".$cuento->title."'<br/> ".$cuento->name."<br/> -".$cuento->age." años<br/>
                </div>";


                foreach($preselects as $preselect){
                    $user=User::where('id','=',$preselect->user_id)->first();

                    $details=$user->details;
                    echo "
                                    <tr class=gradeA>
                                    <td>$details->name $details->lastname</td>
                                    <td>$cuento->category años</td>
                                    <td>$preselect->eval1</td>
                                    <td>$preselect->eval2</td>
                                    <td>$preselect->eval3</td>
                                    <td>".number_format($preselect->average,2)."</td>

                                    </tr>";
                }
                //////////END IF TYPE=0/////
            }else{
                //////////IF TYPE=1/////
                $preselects=Preselect::where('document_id','=',$document_id)->where('status','=','1')->where('type','=','1')->get();

                $historia=Historia::where('id','=',$document_id)->first();
                echo "<div class='preselect_detail_info'>
                '".$historia->title."'<br/> ".$historia->name."<br/><br/>
                </div>";


                foreach($preselects as $preselect){
                    $user=User::where('id','=',$preselect->user_id)->first();

                    $details=$user->details;
                    echo "
                                    <tr class=gradeA>
                                    <td>$details->name $details->lastname</td>
                                    <td>$historia->category </td>
                                    <td>$preselect->eval1</td>
                                    <td>$preselect->eval2</td>
                                    <td>$preselect->eval3</td>
                                    <td>".number_format($preselect->average,2)."</td>

                                    </tr>";
                }

                //////////END IF TYPE=1/////
            }



            ?>



            </tbody>
        </table>

    </div><!--contentwrapper-->
</div><!-- centercontent -->
@stop

@section('jscode')
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('#m_preselect').addClass('active');


        //LIGHTBOX//
        jQuery('a').nivoLightbox({
            afterShowLightbox: function(lightbox){

            }
        });


    });
</script>
@stop