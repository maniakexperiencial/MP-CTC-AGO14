<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Login Page | Amanda Admin Template</title>
    {{ HTML::style('css/style.default.css', array('media' => 'screen')) }}
    {{ HTML::script('http://code.jquery.com/jquery-latest.min.js') }}
    {{ HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js') }}

    {{ HTML::script('js/plugins/jquery-ui-1.8.16.custom.min.js') }}
    {{ HTML::script('js/plugins/jquery.cookie.js') }}
    {{ HTML::script('js/plugins/jquery.uniform.min.js') }}
    {{ HTML::script('js/custom/general.js') }}
    {{ HTML::script('js/custom/index.js') }}

    {{ HTML::style('css/style_admin.css', array('media' => 'screen')) }}
    <!--[if IE 9]>
    {{ HTML::style('css/style.ie9.css', array('media' => 'screen')) }}
    <![endif]-->
    <!--[if IE 8]>
    {{ HTML::style('css/style.ie8.css', array('media' => 'screen')) }}
    <![endif]-->
    <!--[if lt IE 9]>
    {{ HTML::script('http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js') }}


<![endif]-->


</head>

<body class="loginpage signup_bg">

<header>
    <div class="Topbar">
        <div class="center_container">
            <div class="logo2"><a href="{{ URL::route('root') }}"><img src="{{ URL::to('/img/logo.png') }}"></a></div>
            <nav id="nav" role="navigation">
                <a href="#nav" title="Show navigation"><div class="toggle_menu"><i class="reorder icon"></i></div></a>
                <a href="#" title="Hide navigation"><div class="toggle_menu"><i class="reorder icon"></i></div></a>
                <!-- <ul class="login_ul">
                     <li><a href="{{Url::route('loginUser_route')}}">Login</a></li>
                 </ul>-->
                <ul id="">
                    <li>
                        <a href="{{ URL::route('root') }}">Home</a>
                    </li>
                    <li class="menu_active">
                        <a href="{{Url::route('loginUser_route')}}">Login</a>
                    </li>
                    <li>
                        <a href="{{ URL::route('signup') }}">Registro</a>
                    </li>


                </ul>
            </nav>
        </div>

    </div>

</header>

	<div class="loginbox" style="margin:2% auto 0 auto;margin-top: 5%;">
    	<div class="loginboxinner">

            <div class="logo" style="margin-top: 10px">
                <img src="{{ URL::to('/img/admin_logo_index.png') }}">
            	<!--<h1><span>AMAN.</span>DA</h1>
                <p>premium admin template</p>-->
            </div><!--logo-->

            <!--<br clear="all" /><br />-->

            <!--<div class="nousername">
				<div class="loginmsg">The password you entered is incorrect.</div>
            </div>

            <div class="nopassword">
				<div class="loginmsg">The password you entered is incorrect.</div>
                <div class="loginf">
                    <div class="thumb"><img alt="" src="images/thumbs/avatar1.png" /></div>
                    <div class="userlogged">
                        <h4></h4>
                        <a href="index.blade.php">Not <span></span>?</a>
                    </div>
                </div>
            </div>-->

            {{ Form::open(['route' => 'signupUser_route']) }}

                <div class="form-group">
                    {{Form::label('select_type', 'Tipo de usuario', ['class' => 'login_label',]) }}
                    {{Form::select('select_type',['padre' => 'Padre', 'doctor' => 'Doctor'], 'padre',['class'=>'signup_blue signup_select', 'id'=>'select_type'])}}
                </div>
            <div class="form-group">
                    {{Form::label('select_institution', 'Institución', ['class' => 'login_label','id'=>'institution_label']) }}
                    <select name="select_institution" class="signup_blue signup_select" id="select_institution" disabled required>
                        <option value="" selected disabled>Nombre de la institución</option>
                        <option value="IMSS">IMSS</option>
                        <option value="ISSSTE">ISSSTE</option>
                        <option value="SSA">SSA</option>
                        <option value="Privado">Privado</option>
                        <option value="Otros">Otros</option>
                    </select>
                    <!--{{Form::select('select_institution',['IMSS' => 'IMSS','ISSSTE' => 'ISSSTE', 'SSA' => 'SSA'], null,['class'=>'signup_blue signup_select', 'id'=>'select_institution','disabled' => 'disabled'])}}-->
            </div>
            <div class="form-group">
                    {{Form::label('name', 'Nombre', ['class' => 'login_label']) }}
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
                    {{Form::label('address', 'Estado', ['class' => 'login_label']) }}
                <?php
                $states = State::lists('state','state');
                ?>
                {{Form::select('address',$states, null,['class'=>'signup_blue signup_select'])}}

                <!--{{Form::text('address', null, ['class' => 'signup_blue','id'=>'address']) }}-->
                {{$errors->first('address',"<span class=error>:message</span>")}}
            </div>
            <div class="form-group">
                    {{Form::label('phone', 'Teléfono', ['class' => 'login_label']) }}
                    {{Form::text('phone', null, ['class' => 'signup_blue','id'=>'phone']) }}
                    {{$errors->first('phone',"<span class=error>:message</span>")}}
             </div>
            <div class="form-group">
                    {{Form::label('mobile', 'Celular', ['class' => 'login_label']) }}
                    {{Form::text('mobile', null, ['class' => 'signup_blue','id'=>'mobile']) }}
                     {{$errors->first('mobile', "<span class=error>:message</span>")}}
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
            <div class="form-group">

                {{Form::checkbox('terms', 'value')}}
                <label class="politica_privacidad"> Le daremos acceso al portal al completar voluntariamente este cuestionario y al marcar el casillero
                    correspondiente. Al enviar este formulario, la información proporcionada, estará regida por la <a href="#">Política de privacidad</a>
                    de nuestro sitio. Para no recibir más comunicados, póngase en contacto con nosotros según se especifica
                    en nuestra <a href="#">Politica de Privacidad</a>
                </label>
                {{$errors->first('terms',"<span class=error>:message</span>")}}
            </div>
                    <a href="{{ URL::route('loginUser_route') }}"><div class="signup_backbtn">Regresar</div></a>

                    <button>Registrar</button>





            {{Form::close()}}



        </div><!--loginboxinner-->
    </div><!--loginbox-->
<script type="text/javascript">
    $(document).ready(function(){

        var bg="{{ URL::to('/img/bg_land.jpg') }}";

       $('.loginpage').css({'background-image': 'url('+bg+')'});

        switch($('#select_type').val()){
            case 'doctor':
                $('#institution_label').fadeIn(200);
                $('#select_institution').fadeIn(200);
                $('#select_institution').prop('disabled', false);
                break;
            case 'padre':
                $('#institution_label').fadeOut(200);
                $('#select_institution').fadeOut(200);
                $('#select_institution').prop('disabled', true);


                break;
            default:
                break;
        }

        $('#select_type').on('change', function() {
            var election= this.value

            switch(election){
                case 'doctor':
                    $('#institution_label').fadeIn(200);
                    $('#select_institution').fadeIn(200);
                    $('#select_institution').prop('disabled', false);
                        break;
                case 'padre':
                    $('#institution_label').fadeOut(200);
                    $('#select_institution').fadeOut(200);
                    $('#select_institution').prop('disabled', true);


                    break;
                default:
                    break;
            } // or $(this).val()
        });


    });
</script>

</body>
</html>
