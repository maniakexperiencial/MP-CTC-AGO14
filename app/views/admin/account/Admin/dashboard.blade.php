@extends('admin.account.Admin.layout')

@section('scripts')
{{ HTML::style('css/jquery.fancybox.css', array('media' => 'screen')) }}
{{ HTML::script('js/jquery.fancybox.js') }}
{{ HTML::script('/js/custom/tables.js') }}
{{ HTML::script('/js/plugins/jquery.dataTables.min.js') }}
@stop

@section('content')
<div class="centercontent tables">
    <div class="pageheader notab">
        <h1 class="pagetitle">Usuarios</h1>
        <h3 class="pagesubtitle">Usuarios registrados en el sistema</h3>
        <span class="pagedesc"></span>
        <div id="message_ajax"></div>
    </div><!--pageheader-->

    <div id="contentwrapper" class="contentwrapper">

        <a href="{{ URL::route('new_juez') }}" class="btn_admin">Agregar Usuario</a>
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
                <th class="t_white">Correo</th>
                <th class="t_white">Categoría</th>
                <th class="t_white">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
            <tr class="gradeA">

                <td>{{ $user->details->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->details->rol }}</td>
                <?php
                $ruta="";
                switch($user->type){
                    case '0':
                        $ruta = URL::route('edit_admin',array('user'=>$user->id));
                        break;
                    case '1':
                        $ruta = URL::route('edit_juez',array('user'=>$user->id));
                        break;

                    case '2':
                        $ruta= URL::route('edit_pd',array('user'=>$user->id));
                        break;
                    default:
                            break;
                }
                ?>
                <td class="center"><a href="" data-user="{{$user->id}}" class="delete">borrar</a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href="<?=$ruta ?>" class="edit">editar</a></td>
            </tr>
            @endforeach


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
   jQuery('#m_usuario').addClass('active');
    jQuery('.delete').click(function(){
        var id_user1=jQuery(this).data('user');
        var parameters={id_user: id_user1};
        jQuery.ajax(
            {
                url : "{{ URL::route('delete_user') }}",
                type: "POST",
                data : parameters,
                success:function(data, textStatus, jqXHR)
                {
                    //data: return data from server
                    jQuery('#message_ajax').html(data);
                    setTimeout(function() {
                        // Do something after 5 seconds
                        jQuery('#message_ajax').fadeOut(200);
                    }, 5000);
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