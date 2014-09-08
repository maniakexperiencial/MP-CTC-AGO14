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
        <h1 class="pagetitle">Usuario</h1>
        <h3 class="pagesubtitle">Editar Usuario</h3>
        <span class="pagedesc"></span>
    </div><!--pageheader-->
    <div id="contentwrapper" class="contentwrapper">
        @if (Session::has('mensaje_request'))
        {{ Session::get('mensaje_request') }}
        @endif
            <!--FORM-->
             <div class="form_wrap">
                 {{ Form::open(array('route' => array('edit_pd_route', $user->id))) }}


                 <div class="form-group">
                     {{Form::label('select_type', 'Tipo de usuario', ['class' => 'login_label',]) }}
                     {{Form::select('select_type',['padre' => 'Padre', 'doctor' => 'Doctor'],$user->details->rol,['class'=>'signup_blue signup_select', 'id'=>'select_type'])}}
                 </div>
                 <div class="form-group">
                     {{Form::label('select_institution', 'Institución', ['class' => 'login_label','id'=>'institution_label']) }}
                     {{Form::select('select_institution',['IMSS' => 'IMSS','ISSSTE' => 'ISSSTE', 'SSA' => 'SSA'], $user->details->institution,['class'=>'signup_blue signup_select', 'id'=>'select_institution','disabled' => 'disabled'])}}
                 </div>
                 <div class="form-group">
                     {{Form::label('name', 'Nombre Completo', ['class' => 'login_label']) }}
                     {{Form::text('name', $user->details->name, ['class' => 'signup_blue','id'=>'name']) }}
                     {{$errors->first('name',"<span class=error>:message</span>")}}
                 </div>
                 <div class="form-group">
                     {{Form::label('lastname', 'Apellidos', ['class' => 'login_label']) }}
                     {{Form::text('lastname', $user->details->lastname, ['class' => 'signup_blue','id'=>'lastname']) }}
                     {{$errors->first('lastname',"<span class=error>:message</span>")}}
                 </div>

                 <div class="form-group">
                     {{Form::label('address', 'Dirección', ['class' => 'login_label']) }}
                     {{Form::text('address', $user->details->address, ['class' => 'signup_blue','id'=>'address']) }}
                     {{$errors->first('address',"<span class=error>:message</span>")}}
                 </div>
                 <div class="form-group">
                     {{Form::label('phone', 'Teléfono', ['class' => 'login_label']) }}
                     {{Form::text('phone', $user->details->phone, ['class' => 'signup_blue','id'=>'phone']) }}
                     {{$errors->first('phone',"<span class=error>:message</span>")}}
                 </div>
                 <div class="form-group">
                     {{Form::label('mobile', 'Celular', ['class' => 'login_label']) }}
                     {{Form::text('mobile', $user->details->mobile, ['class' => 'signup_blue','id'=>'mobile']) }}
                     {{$errors->first('mobile', "<span class=error>:message</span>")}}
                 </div>

                 <div  class="form_btnwrap">
                 <a href="{{ URL::route('dashboard_admin') }}"><div class="signup_backbtn" >Cancelar</div></a>

                 <button >Guardar</button>
                 </div>




                 {{Form::close()}}
             </div>
    </div><!--contentwrapper-->
</div><!-- centercontent -->
@stop

@section('jscode')
<script type="text/javascript">
jQuery(document).ready(function(){
   jQuery('#m_usuario').addClass('active');

    switch(jQuery('#select_type').val()){
        case 'doctor':
            jQuery('#institution_label').fadeIn(200);
            jQuery('#select_institution').fadeIn(200);
            jQuery('#select_institution').prop('disabled', false);
            break;
        case 'padre':
            jQuery('#institution_label').fadeOut(200);
            jQuery('#select_institution').fadeOut(200);
            jQuery('#select_institution').prop('disabled', true);


            break;
        default:
            break;
    }


    jQuery('#select_type').on('change', function() {
        var election= this.value

        switch(election){
            case 'doctor':
                jQuery('#institution_label').fadeIn(200);
                jQuery('#select_institution').fadeIn(200);
                jQuery('#select_institution').prop('disabled', false);
                break;
            case 'padre':
                jQuery('#institution_label').fadeOut(200);
                jQuery('#select_institution').fadeOut(200);
                jQuery('#select_institution').prop('disabled', true);


                break;
            default:
                break;
        } // or $(this).val()
    });

});
</script>
@stop