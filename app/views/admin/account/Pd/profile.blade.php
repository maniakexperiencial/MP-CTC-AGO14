@extends('admin.account.Pd.layout')

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
        <h1 class="pagetitle">Perfil</h1>
        <h3 class="pagesubtitle">Editar Perfil</h3>
        <span class="pagedesc"></span>
    </div><!--pageheader-->
    <div id="contentwrapper" class="contentwrapper">
        @if (Session::has('mensaje_request'))
        {{ Session::get('mensaje_request') }}
        @endif
        <!--FORM-->
        <div class="form_wrap">
            {{ Form::open(array('route' => array('edit_profile_route', $user->id))) }}


            <div class="form-group">
                {{Form::label('name', 'Nombre Completo', ['class' => 'login_label']) }}
                {{Form::text('name', $user->details->name , ['class' => 'signup_blue','id'=>'name']) }}
                {{$errors->first('name',"<span class=error>:message</span>")}}
            </div>
            <div class="form-group">
                {{Form::label('lastname', 'Apellidos', ['class' => 'login_label']) }}
                {{Form::text('lastname', $user->details->lastname, ['class' => 'signup_blue','id'=>'lastname']) }}
                {{$errors->first('lastname',"<span class=error>:message</span>")}}
            </div>
            <div class="form-group">
                {{Form::label('address', 'Estado', ['class' => 'login_label']) }}
                <?php
                $states = State::lists('state','state');
                ?>
                {{Form::select('address',$states, $user->details->address,['class'=>'signup_blue signup_select'])}}

                <!--{{Form::text('address', null, ['class' => 'signup_blue','id'=>'address']) }}-->
                {{$errors->first('address',"<span class=error>:message</span>")}}
            </div>
            <div class="form-group">
                {{Form::label('phone', 'Teléfono', ['class'=>'login_label']) }}
                {{Form::text('phone', $user->details->phone, ['class' => 'signup_blue','id'=>'phone']) }}
                {{$errors->first('phone',"<span class=error>:message</span>")}}
            </div>
            <div class="form-group">
                {{Form::label('mobile', 'Celular', ['class'=>'login_label']) }}
                {{Form::text('mobile', $user->details->mobile, ['class' => 'signup_blue','id'=>'mobile']) }}
                {{$errors->first('mobile', "<span class=error>:message</span>")}}
            </div>
            <!--<div class="form-group">
                {{Form::label('email', 'Correo electrónico', ['class' => 'login_label']) }}
                {{Form::email('email', $user->email, ['class' => 'signup_blue','id'=>'email']) }}
                {{$errors->first('email',"<span class=error>:message</span>")}}
            </div>-->

            <!-- <div class="form-group">
                 {{Form::label('password', 'Contraseña', ['class' => 'login_label']) }}
                 {{Form::password('password',['class' => 'signup_blue','id'=>'password']) }}
                 {{$errors->first('password',"<span class=error>:message</span>")}}
             </div>
             <div class="form-group">
                 {{Form::label('password_confirmation', 'Repetir Contraseña', ['class' => 'login_label']) }}
                 {{Form::password('password_confirmation',['class' => 'signup_blue','id'=>'password']) }}

             </div>-->
            <div  class="form_btnwrap">
                <!--<a href="{{ URL::route('dashboard_admin') }}"><div class="signup_backbtn" >Cancelar</div></a>-->

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
        jQuery('#m_profile').addClass('active');





    });
</script>
@stop