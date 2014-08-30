@extends('admin.account.Juez.layout')

@section('scripts')
{{ HTML::style('css/jquery.fancybox.css', array('media' => 'screen')) }}
{{ HTML::script('js/jquery.fancybox.js') }}
{{ HTML::script('/js/custom/tables.js') }}
{{ HTML::script('/js/plugins/jquery.dataTables.min.js') }}
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


            <tr class="gradeA">

                <td>Alvaro</td>
                <td>Nombre del cuento</td>
                <td>Niños</td>
                <td><a href="#" class="underline">Leer Cuento</a></td>
                <td class="center"><a href="" class="evaluate">evaluar</a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href="" class="delete">borrar</a></td>
            </tr>
            <tr class="gradeA">

                <td>Alvaro</td>
                <td>Nombre del cuento</td>
                <td>Niños</td>
                <td><a href="#" class="underline">Leer Cuento</a></td>
                <td class="center"><a href="" class="evaluate">evaluar</a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href="" class="delete">borrar</a></td>
            </tr>
            <tr class="gradeA">

                <td>Alvaro</td>
                <td>Nombre del cuento</td>
                <td>Niños</td>
                <td><a href="#" class="underline">Leer Cuento</a></td>
                <td class="center"><a href="" class="evaluate">evaluar</a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href="" class="delete">borrar</a></td>
            </tr>
            <tr class="gradeA">

                <td>Alvaro</td>
                <td>Nombre del cuento</td>
                <td>Niños</td>
                <td><a href="#" class="underline">Leer Cuento</a></td>
                <td class="center"><a href="" class="evaluate">evaluar</a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href="" class="delete">borrar</a></td>
            </tr>

            </tbody>
        </table>
        <div class="dataTables_paginate paging_full_numbers table_blue" id="dyntable_paginate">
            <span class="position_first" id="dyntable_first">Inicio</span>
            <span class="position_prev" id="dyntable_previous">Anterior</span>
            <!--<span><span class="paginate_active">1</span><span class="paginate_button">2</span>
                <span class="paginate_button">3</span><span class="paginate_button">4</span>
                <span class="paginate_button">5</span>
            </span>-->
            <span class="position_number">2</span>
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
    });
</script>
@stop