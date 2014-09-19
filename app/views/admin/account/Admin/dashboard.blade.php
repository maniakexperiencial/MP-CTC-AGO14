@extends('admin.account.Admin.layout')

@section('scripts')

{{ HTML::script('/js/custom/tables.js') }}


{{ HTML::script('http://code.jquery.com/jquery-latest.min.js') }}


{{ HTML::style('//cdn.datatables.net/1.10.2/css/jquery.dataTables.css', array('media' => 'screen')) }}
{{ HTML::script('http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js') }}

{{ HTML::style('css/plugins/styledataTables.css', array('media' => 'screen')) }}
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
                <th class="t_white">Correo</th>
                <th class="t_white">Categoría</th>
                <th class="t_white">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
            <tr class="gradeA" id="tr{{$user->id}}">

                <td>{{ $user->details->name }} {{ $user->details->lastname }}</td>
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
                <td class="center"><a href="#"  data-user="{{$user->id}}" class="delete">borrar</a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href="<?=$ruta ?>" class="edit">editar</a></td>
            </tr>
            @endforeach


            </tbody>
        </table>

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

        alertify.confirm("Eliminar usuario?", function (e) {
            if (e) {
                // user clicked "ok"
                jQuery.ajax(
                    {
                        url : "{{ URL::route('delete_user') }}",
                        type: "POST",
                        data : parameters,
                        success:function(data, textStatus, jqXHR)
                        {
                            //data: return data from server
                            jQuery('#tr'+id_user1).fadeOut();
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
            } else {
                // user clicked "cancel"
                return false;
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