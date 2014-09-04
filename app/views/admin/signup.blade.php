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

	<div class="loginbox" style="margin:2% auto 0 auto">
    	<div class="loginboxinner">

            <div class="logo">
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
                    {{Form::select('select_institution',['IMSS' => 'IMSS'], null,['class'=>'signup_blue signup_select', 'id'=>'select_institution','disabled' => 'disabled'])}}
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
                    {{Form::label('address', 'Dirección', ['class' => 'login_label']) }}
                    {{Form::text('address', null, ['class' => 'signup_blue','id'=>'address']) }}
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
