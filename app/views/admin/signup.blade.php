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

            <br clear="all" /><br />

            <div class="nousername">
				<div class="loginmsg">The password you entered is incorrect.</div>
            </div><!--nousername-->

            <div class="nopassword">
				<div class="loginmsg">The password you entered is incorrect.</div>
                <div class="loginf">
                    <div class="thumb"><img alt="" src="images/thumbs/avatar1.png" /></div>
                    <div class="userlogged">
                        <h4></h4>
                        <a href="index.blade.php">Not <span></span>?</a>
                    </div>
                </div><!--loginf-->
            </div><!--nopassword-->

            {{ Form:open(['route' => 'signupUser_route']) }}

                <div class="form-group">
                    {{Form::label('name', 'Name') }}
                    {{Form::text('name', null, ['class' => 'form-control']) }}
                </div>



            {{Form:close()}}

            <form id="login" action="dashboard.html" method="post">
                <label for="select_type" class="login_label">Tipo de usuario 123</label>

                <select name="select_type" id="select_type" class="signup_blue signup_select">
                    <option value="padre" selected="selected">Padre</option>
                    <option value="doctor">Doctor</option>


                </select>

                <label for="institution" class="login_label" id="institution_label">Institución</label>
                <select name="select_institution" id="select_institution" class="signup_blue signup_select">
                    <option value="IMSS" selected="selected">IMSS</option>



                </select>


                <label for="name" class="login_label">Nombre completo</label>
                	<input type="text" name="username" id="name" class="signup_blue" required="required" />


                <label for="lastname" class="login_label" required="required">Apellidos</label>
                <input type="text" name="lastname" id="lastname" class="signup_blue" />


                <label for="email" class="login_label">Correo electrónico</label>
                <input type="email" name="email" id="email" class="signup_blue" required="required" />



                <label for="address" class="login_label">Dirección</label>
                <input type="text" name="address" id="address" class="signup_blue" required="required" />

                <label for="phone" class="login_label">Teléfono</label>
                <input type="text" name="phone" id="phone" class="signup_blue" required="required" />


                <label for="mobile" class="login_label">Celular</label>
                <input type="text" name="mobile" id="mobile" class="signup_blue" required="required" />

                <label for="password" class="login_label">Contraseña</label>

                <input type="password" name="password" id="password" class="signup_blue" required="required" />


               <a href="{{ URL::route('login') }}"><div class="signup_backbtn">Regresar</div></a>

                <button>Registrar</button>



            </form>

        </div><!--loginboxinner-->
    </div><!--loginbox-->
<script type="text/javascript">
    $(document).ready(function(){

        var bg="{{ URL::to('/img/bg_land.jpg') }}";

       $('.loginpage').css({'background-image': 'url('+bg+')'});
        $('#select_type').on('change', function() {
            var election= this.value

            switch(election){
                case 'doctor':
                    $('#institution_label').fadeIn(200);
                    $('#select_institution').fadeIn(200);
                        break;
                case 'padre':
                    $('#institution_label').fadeOut(200);
                    $('#select_institution').fadeOut(200);
                    break;
                default:
                    break;
            } // or $(this).val()
        });


    });
</script>

</body>
</html>
