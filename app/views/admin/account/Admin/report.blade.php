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
        <h1 class="pagetitle">Reportes</h1>
        <span class="pagedesc"></span>
    </div><!--pageheader-->
    <div id="contentwrapper" class="contentwrapper" style="text-align: center;">
                <a href="#" class="btn_admin">Descargar Reporte</a>
    </div><!--contentwrapper-->


    <!------NIÑOS----->
    <table style="border: 1px solid black; margin: 10px; float: left">
        <thead>
        <tr>

            <th class="t_white">Nombre</th>
            <th class="t_white">Nombre del Cuento</th>
            <th class="t_white">Edad</th>
            <th class="t_white">Categoria</th>
            <th class="t_white">Estado</th>
            <th class="t_white">Calificacion</th>
            <th class="t_white">Views</th>
            <th class="t_white">Likes</th>
            <!--<th class="t_white">Acciones</th>-->
        </tr>
        </thead>
    <?php
    $cuentos=Cuento::all();
    foreach($cuentos as $cuento){
        $user=User::where('id','=',$cuento->user_id)->get();

        $average=Preselect::where('type','=','0')->where('status','=','1')->where('document_id','=',$cuento->id)->groupBy('document_id')->avg('average');
        $views=$cuento->views->count();
        $likes=$cuento->likes->count();
        echo " <tr>
                <td >$cuento->name</td>
                <td >$cuento->title</td>
                <td >$cuento->age</td>
                <td >$cuento->category</td>
                <td >$cuento->state</td>
                <td >$average</td>
                <td >$views</td>
                <td >$likes</td>

               </tr>


                ";

    }
    ?>
    </table>
    <!------PAPAS----->
    <table style="border: 1px solid black; margin: 10px;">
        <thead>
        <tr>

            <th class="t_white">Nombre</th>
            <th class="t_white">Nombre de la Historia</th>
            <th class="t_white">Telefono</th>
            <th class="t_white">Correo Electrónico</th>
            <th class="t_white">Estado</th>
            <th class="t_white">Calificacion</th>

            <!--<th class="t_white">Acciones</th>-->
        </tr>
        </thead>
        <?php
        $historias=Historia::all();
        foreach($historias as $historia){
            $user=User::where('id','=',$historia->user_id)->get();

            if($historia->category=='padres'){
                $average=Preselect::where('type','=','1')->where('status','=','1')->where('document_id','=',$historia->id)->groupBy('document_id')->avg('average');

                echo " <tr>
                <td >".$user->details->name."</td>
                <td >".$historia->title."</td>
                <td >.$user->phone.</td>
                <td >".$user->email."</td>
                <td >".$historia->state."</td>
                <td >".$average."</td>

               </tr>


                ";

            }



        }
        ?>
    </table>

    <!------DOCTORES----->
    <table style="border: 1px solid black; margin: 10px;">
        <thead>
        <tr>

            <th class="t_white">Nombre</th>
            <th class="t_white">Nombre de la Historia</th>
            <th class="t_white">Telefono</th>
            <th class="t_white">Correo Electrónico</th>
            <th class="t_white">Estado</th>
            <th class="t_white">Calificacion</th>
            <th class="t_white">Institucion</th>

            <!--<th class="t_white">Acciones</th>-->
        </tr>
        </thead>
        <?php
        $historias=Historia::all();
        foreach($historias as $historia){
            $user=User::where('id','=',$historia->user_id)->first();
           if($user->details)
           {
                    if($historia->category=='doctores'){
                        $average=Preselect::where('type','=','1')->where('status','=','1')->where('document_id','=',$historia->id)->groupBy('document_id')->avg('average');

                        echo " <tr>
                        <td >".$user->details->name."</td>
                        <td >".$historia->title."</td>
                        <td >".$user->details->phone."</td>
                        <td >".$user->email."</td>
                        <td >".$historia->state."</td>
                        <td >".$average."</td>
                        <td >".$user->details->institution."</td>

                       </tr>


                        ";

                    }
           }



        }
        ?>
    </table>

</div><!-- centercontent -->
@stop

@section('jscode')
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('#m_report').addClass('active');
    });
</script>
@stop