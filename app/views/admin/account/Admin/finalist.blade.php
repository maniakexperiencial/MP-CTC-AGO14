@extends('admin.account.Admin.layout')

@section('scripts')
{{ HTML::script('http://code.jquery.com/jquery-latest.min.js') }}



{{ HTML::script('http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js') }}

{{ HTML::style('css/plugins/styledataTables.css', array('media' => 'screen')) }}

@stop

@section('content')
<div class="centercontent tables">
    <div class="pageheader notab">
        <h1 class="pagetitle">Finalistas</h1>
        <span class="pagedesc"></span>
    </div><!--pageheader-->
    <div id="contentwrapper" class="contentwrapper">

        <table cellpadding="0" cellspacing="0" border="0" class="stdtable stdtablequick table_blue" id="table_finalist"  >
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
                <th class="t_white">Lugar</th>
                <!--<th class="t_white">Acciones</th>-->
            </tr>
            </thead>
            <tbody>
            <?php

                //$preselects=DB::table('preselects')->where('type','=','0')->groupBy('document_id')->avg('average');
                //dd(var_dump($preselects));

                /*$preselects=Preselect::where('type','=','0')->where('status','=','1')->groupBy('document_id','type')->orderBy('average', 'DESC')->get();
                foreach($preselects as $preselect){
                    $cuento=Cuento::where('id','=',$preselect->document_id)->first();
                    echo "<tr class=gradeA>
                              <td>$cuento->name</td>
                              <td>$cuento->title</td>
                              <td>$cuento->category</td>
                              <td>$preselect->average</td>
                           </tr>";
                }*/
            $preselects=Preselect::where('type','=','0')->where('status','=','1')->groupBy('document_id')->orderBy('average', 'DESC')->get();



            foreach($preselects as $preselect){
                $cuento=Cuento::where('id','=',$preselect->document_id)->first();
                if($cuento){
                    $preselcuent=Preselect::where('document_id','=',$preselect->document_id)->where('type','=','0')->avg('average');
                    $route=URL::route('win_position',array('document_id'=>$cuento->id,'type'=>0));
                    echo "<tr class=gradeA>
                              <td>$cuento->name</td>
                              <td>$cuento->title</td>
                              <td>$cuento->category</td>
                              <td>".number_format($preselcuent,2)."</td>";
                            if($cuento->place!=0){
                                echo "<td>".$cuento->place."</td>";
                            }else{
                                echo "<td><a href=$route  data-lightbox-type=inline  class=underline>Asignar Lugar</a></td>";
                            }

                           echo "</tr>";
                }else{

                }

            }
            $preselects=Preselect::where('type','=','1')->where('status','=','1')->groupBy('document_id')->orderBy('average', 'DESC')->get();
            foreach($preselects as $preselect){
                $historia=Historia::where('id','=',$preselect->document_id)->first();
                $preselcuent=Preselect::where('document_id','=',$preselect->document_id)->where('type','=','1')->avg('average');
                $route=URL::route('win_position',array('document_id'=>$historia->id,'type'=>1));
                 echo "<tr class=gradeA>
                              <td>$historia->name</td>
                              <td>$historia->title</td>
                              <td>$historia->category</td>
                              <td>".number_format($preselcuent,2)."</td>";

                                if($historia->place!=0){
                                    echo "<td>".$historia->place."</td>";
                                }else{
                                    echo "<td><a href=$route  data-lightbox-type=inline  class=underline>Asignar Lugar</a></td>";
                                }


                           echo "</tr>";
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
        jQuery('#m_finalist').addClass('active');


        $('#table_finalist').dataTable( {
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