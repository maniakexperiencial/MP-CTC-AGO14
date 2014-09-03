@extends('admin.account.Juez.layout')

@section('scripts')


{{ HTML::script('http://code.jquery.com/jquery-latest.min.js') }}


{{ HTML::style('//cdn.datatables.net/1.10.2/css/jquery.dataTables.css', array('media' => 'screen')) }}
{{ HTML::script('http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js') }}

{{ HTML::style('css/plugins/styledataTables.css', array('media' => 'screen')) }}
@stop

@section('content')
<div class="centercontent tables">
    <div class="pageheader notab">
        <h1 class="pagetitle">Preseleccionados</h1>
        <span class="pagedesc"></span>
    </div><!--pageheader-->
    <div id="contentwrapper" class="contentwrapper">

        <table cellpadding="0" cellspacing="0" border="0" class="stdtable stdtablequick table_blue" id="table_preselect" >
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

                <th class="t_white">Nombre</th>
                <th class="t_white">Nombre del Cuento o Historia</th>
                <th class="t_white">Categoría</th>
                <th class="t_white">Cuentos</th>
                <th class="t_white">Acciones</th>
            </tr>
            </thead>
            <tbody>

                <!---------------------------------CUENTOS-------------------------------------------->

                <?php
                foreach($user->preselects as $preselect){
                if($preselect->type==0){

                    $cuento=Cuento::where('id','=',$preselect->document_id)->first();
                    if($cuento){
                        echo " <div class=hidden_cuento id=cuento$cuento->id >
                                <div class=cuento_first_wrap>
                                    <div class=hidden_cuento_title><h2 style=margin-top:0;>$cuento->title</h2><h5>-$cuento->name  $cuento->age  años</h5></div>

                                    <img height=100% src=".URL::to('/cuentos_images/'.$cuento->images->first()->path).">
                                </div>
                                <div class=cuento_second_wrap>
                                    <div class=cuento_second_wrap_title><p>TRANSCRIPCION</p>
                                        <p>$cuento->text</p>
                                    </div>

                                </div>
                        </div>";
                        echo "


                                            <div class=hidden_evaluar id=evaluar$cuento->id >

                                                <div class=evaluar_title>Evaluación</div>
                                                <div class='evaluar_desc_wrap'>
                                                    <div class=evaluar_cutitle>$cuento->title</div>
                                                    <div class=evaluar_name>-$cuento->name</div>
                                                    <div class=evaluar_age>$cuento->age años</div>
                                                </div>
                                                <div style='width: 100%;height: auto;'>

                                                    <div class=evaluar_column>
                                                        <span class=title_cucolumn>Contenido</span>
                                                        <input type=text class='input_eval' data-eval='contenido' id='evcont$cuento->id' name='evcont' >
                                                    </div>
                                                    <div class=evaluar_column >
                                                        <span class=title_cucolumn>originalidad</span>
                                                        <input type=text class='input_eval' data-eval='originalidad' id='evoriginal$cuento->id' name='evoriginal'>
                                                    </div>
                                                    <div class=evaluar_column >
                                                        <span class=title_cucolumn>mensaje</span>
                                                        <input type=text class='input_eval' data-eval='mensaje' id='evmensaje$cuento->id' name='evmensaje'>
                                                    </div>
                                                    <div class=evaluar_btn_wrap>
                                                        <div class=evaluar_btn data-id='$cuento->id' data-type='0'>Evaluar</div>

                                                    </div>

                                                </div>

                                            </div>


                                            ";
                        echo "
                                    <tr class=gradeA>

                                            <td>$cuento->name</td>
                                            <td>$cuento->title</td>
                                            <td>$cuento->category</td>
                                            <td> <a href=#cuento$cuento->id  data-lightbox-type=inline data-lightbox-gallery=gallery1 class=underline>Leer Cuento</a></td>
                                            <td class=center>
                                            ";
                        if($preselect->status==0){
                            echo "<a href=#evaluar$cuento->id  data-lightbox-type=inline  class=underline>evaluar</a>";
                        }else{

                        }

                        echo "</tr>";
                    }else{

                    }

                //END IF PRESELECT TYPE=0
                }else{

                    $historia=Historia::where('id','=',$preselect->document_id)->first();
                    if($historia){
                        echo "   <div class=hidden_history id=historia$historia->id  >
                                        <div class=hidden_history_title><h2 style=margin-top: 0;>$historia->title</h2><h4>-$historia->name</h4></div>

                                        <div class=hidden_history_content>
                                            $historia->text
                                        </div>
                                </div>";
                        echo "


                                            <div class=hidden_evaluar id=evaluarh$historia->id >

                                                <div class=evaluar_title>Evaluación</div>
                                                <div class='evaluar_desc_wrap'>
                                                    <div class=evaluar_cutitle>$historia->title</div>
                                                    <div class=evaluar_name>-$historia->name</div>
                                                    <div class=evaluar_age>$historia->age años</div>
                                                </div>
                                                <div style='width: 100%;height: auto;'>

                                                    <div class=evaluar_column>
                                                        <span class=title_cucolumn>Contenido</span>
                                                        <input type=text class='input_eval' data-eval='contenido' id='evcont$historia->id' name='evcont' >
                                                    </div>
                                                    <div class=evaluar_column >
                                                        <span class=title_cucolumn>originalidad</span>
                                                        <input type=text class='input_eval' data-eval='originalidad' id='evoriginal$historia->id' name='evoriginal'>
                                                    </div>
                                                    <div class=evaluar_column >
                                                        <span class=title_cucolumn>mensaje</span>
                                                        <input type=text class='input_eval' data-eval='mensaje' id='evmensaje$historia->id' name='evmensaje'>
                                                    </div>
                                                    <div class=evaluar_btn_wrap>
                                                        <div class=evaluar_btn data-id='$historia->id' data-type='1'>Evaluar</div>

                                                    </div>

                                                </div>

                                            </div>


                                            ";
                        echo "
                                    <tr class=gradeA>

                                            <td>$historia->name</td>
                                            <td>$historia->title</td>
                                            <td>$historia->category</td>
                                            <td> <a href=#historia$historia->id  data-lightbox-type=inline data-lightbox-gallery=gallery1 class=underline>Leer Historia</a></td>
                                            <td class=center>
                                            ";
                        if($preselect->status==0){
                            echo "<a href=#evaluarh$historia->id  data-lightbox-type=inline  class=underline>evaluar</a>";
                        }else{

                        }

                        echo "</tr>";
                    }else{

                    }
                //END IF PRESELECT TYPE=1
                }








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

        var evaluacioncontenido="";
        var evaluacionoriginal="";
        var evaluacionmensaje="";


        //LIGHTBOX//
        jQuery('a').nivoLightbox({
            afterShowLightbox: function(lightbox){
                evaluacioncontenido="";
                evaluacionoriginal="";
                evaluacionmensaje="";
            }
        });

        /////////////EVALUAR//////////


        ////////////////PATCH PARA OBTENER VALORES EN INPUTS////////////////
        $('body').on('keyup', '.input_eval', function() {
            switch ($(this).attr('data-eval')){
                case 'contenido':
                    evaluacioncontenido=$(this).val();
                    break;
                case 'originalidad':
                    evaluacionoriginal=$(this).val();
                    break;
                case 'mensaje':
                    evaluacionmensaje=$(this).val();
                    break;
                default:
                       break;
            }
               // evaluacioncontenido=$(this).val();
               //$(this).attr('value',$(this).val());
        });



        $('body').on('click', '.evaluar_btn', function() {
            var objeto=jQuery(this);
            var document_id=objeto.attr('data-id');
            var type2=objeto.attr('data-type');
            //alert(type2);

           /* var evcontent=jQuery('#evcont'+document_id).val();
            var evoriginal=jQuery('#evoriginal'+document_id).val();
            var evmensaje=jQuery('#evmensaje'+document_id).val();*/

            //alert($('#evcont11').val());
            //alert(evaluacioncontenido+evaluacionoriginal+evaluacionmensaje+'id='+document_id+'type='+type);

            var parameters={document_id: document_id,type: type2,evalcontent:evaluacioncontenido,evaloriginal:evaluacionoriginal,evalmensaje:evaluacionmensaje};
            urlaction="{{ URL::route('evaluate') }}";
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
                        window.location = window.location;


                    },
                    error: function(jqXHR, textStatus, errorThrown)
                    {
                        //if fails
                        alert(errorThrown);
                    }
                });
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

    });
</script>
@stop