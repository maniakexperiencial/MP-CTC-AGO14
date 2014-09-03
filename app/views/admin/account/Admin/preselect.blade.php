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
        <h1 class="pagetitle">Preseleccionados</h1>
        <span class="pagedesc">Cuentos</span>
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
                <th class="t_white">Calificación</th>
                <th class="t_white">Acciones</th>
            </tr>
            </thead>
            <tbody>


            <?php
             $users=User::all();
            $preselects=Preselect::groupBy('document_id','type')->get();


              foreach($preselects as $preselect){
                  if($preselect->type==0)
                  {
                      if($preselect->status==1){

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
                                                        <tr class=gradeA>

                                                                <td>$cuento->name</td>
                                                                <td>$cuento->title</td>
                                                                <td>$cuento->category</td>
                                                                <td> <a href='".URL::route('detalle_preselect',['type'=>0,'preselect_id'=>$preselect->document_id])."'  class=underline>Ver Promedio</a></td>
                                                                <td class=center> <a a href=#cuento$cuento->id  data-lightbox-type=inline data-lightbox-gallery=gallery1 class=edit>Leer</a></td>
                                                        </tr>";
                          }else{

                          }



                      }
                      //END IF TYPE=0
                  }else{
                      if($preselect->status==1){

                          $historia=Historia::where('id','=',$preselect->document_id)->first();
                          if($historia){
                              echo "   <div class=hidden_history id=historia$historia->id  >
                                            <div class=hidden_history_title><h2 style=margin-top: 0;>$historia->title</h2><h4>-$historia->name</h4></div>

                                            <div class=hidden_history_content>
                                                $historia->text
                                            </div>
                                        </div>";

                              echo "
                                                        <tr class=gradeA>

                                                                <td>$historia->name</td>
                                                                <td>$historia->title</td>
                                                                <td>$historia->category</td>
                                                                <td> <a href='".URL::route('detalle_preselect',['type'=>1,'preselect_id'=>$preselect->document_id])."'  class=underline>Ver Promedio</a></td>
                                                                <td class=center> <a a href=#historia$historia->id  data-lightbox-type=inline data-lightbox-gallery=gallery1 class=edit>Leer</a></td>
                                                        </tr>";
                          }else{

                          }



                      }
                      //END IF TYPE=1
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