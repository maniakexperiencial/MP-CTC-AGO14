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
        <h1 class="pagetitle">Preseleccionados</h1>
        <span class="pagedesc"></span>
    </div><!--pageheader-->
    <div id="contentwrapper" class="contentwrapper">
        <div id="dyntable_length" class="dataTables_length table_blue">
            <label>
                Mostrar
                <select size="1" name="dyntable_length">
                    <option value="10" selected="selected">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select> entradas
            </label>
        </div>
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

                <th class="t_white">Nombre</th>
                <th class="t_white">Nombre del Cuento</th>
                <th class="t_white">Categoría</th>
                <th class="t_white">Cuentos</th>
                <th class="t_white">Acciones</th>
            </tr>
            </thead>
            <tbody>
                <?php
                foreach($user->preselects as $preselect){
                    if($preselect->status==0){

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
                                            <td> <a href=#cuento$cuento->id  data-lightbox-type=inline data-lightbox-gallery=gallery1 class=underline>Leer Cuento</a></td>
                                            <td class=center><a href='' class=evaluate>evaluar</a></td>
                                    </tr>";
                        }else{

                        }



                    }


                }
                ?>









            </tbody>
        </table>
        <div class="dataTables_paginate paging_full_numbers table_blue" id="dyntable_paginate">
            <span class="position_first" id="dyntable_first">Inicio</span>
            <span class="position_prev" id="dyntable_previous">Anterior</span>
            <!--<span><span class="paginate_active">1</span><span class="paginate_button">2</span>
                <span class="paginate_button">3</span><span class="paginate_button">4</span>
                <span class="paginate_button">5</span>
            </span>-->
            <span class="position_number">1</span>
            <span class="position_next" id="dyntable_next">Siguiente</span>
            <span class="position_last" id="dyntable_last">Ùltimo</span>
        </div>
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