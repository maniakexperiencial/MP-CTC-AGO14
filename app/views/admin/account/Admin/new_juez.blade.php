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
    </div><!--pageheader-->
    <div id="contentwrapper" class="contentwrapper">
        @if (Session::has('mensaje_request'))
        {{ Session::get('mensaje_request') }}
        @endif
            <!--FORM-->
             <div class="form_wrap">
                 {{ Form::open(['route' => 'create_juez_route']) }}


                 <div class="form-group">
                     {{Form::label('name', 'Nombre Completo', ['class' => 'login_label']) }}
                     {{Form::text('name', null, ['class' => 'signup_blue','id'=>'name']) }}
                     {{$errors->first('name',"<span class=error>:message</span>")}}
                 </div>
                 <div class="form-group">
                     {{Form::label('lastname', 'Apellidos', ['class' => 'login_label']) }}
                     {{Form::text('lastname', null, ['class' => 'signup_blue','id'=>'lastname']) }}
                     {{$errors->first('lastname',"<span class=error>:message</span>")}}
                 </div>
                 <div class="form-group">
                     {{Form::label('email', 'Correo electrónico', ['class' => 'login_label']) }}
                     {{Form::email('email', null, ['class' => 'signup_blue','id'=>'email']) }}
                     {{$errors->first('email',"<span class=error>:message</span>")}}
                 </div>

                 <div class="form-group">
                     {{Form::label('password', 'Contraseña', ['class' => 'login_label']) }}
                     {{Form::password('password',['class' => 'signup_blue','id'=>'password']) }}
                     {{$errors->first('password',"<span class=error>:message</span>")}}
                 </div>
                 <div class="form-group">
                     {{Form::label('password_confirmation', 'Repetir Contraseña', ['class' => 'login_label']) }}
                     {{Form::password('password_confirmation',['class' => 'signup_blue','id'=>'password']) }}

                 </div>
                 <div  class="form_btnwrap">
                 <a href="{{ URL::route('dashboard_admin') }}"><div class="signup_backbtn" >Regresar</div></a>

                 <button >Registrar</button>
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
});
</script>
@stop