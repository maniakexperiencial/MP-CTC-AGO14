<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Login Page | Amanda Admin Template</title>
    {{ HTML::style('css/style.default.css', array('media' => 'screen')) }}
    {{ HTML::script('http://code.jquery.com/jquery-latest.min.js') }}
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

<body class="loginpage">

	<div class="loginbox">
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

            {{ Form::open(['route' => 'loginUser_route']) }}
            @if (Session::has('mensaje_request'))
            {{ Session::get('mensaje_request') }}
            @endif

            <div class="form-group">
                {{Form::label('email', 'CORREO ELECTRÓNICO', ['class' => 'login_label']) }}
                {{Form::email('email', null, ['class' => 'login_blue','id'=>'email']) }}
                {{$errors->first('email',"<span class=error>:message</span>")}}

            </div>
            <div class="form-group">
                {{Form::label('password', 'CONTRASEÑA', ['class' => 'login_label']) }}
                {{Form::password('password',['class' => 'login_blue','id'=>'password']) }}
                {{$errors->first('password',"<span class=error>:message</span>")}}

            </div>
                <button>ENTRAR</button>

                <div class="keep"><input type="checkbox" name="remember" id="remember" /><label for="remember"> Keep me logged in</label></div>

            {{Form::close()}}

            <div style="margin-bottom: 15%;">&nbsp;</div>

            <div class="login_option">¿Aún no estas registrado?</div>
            <div class="login_option">Registrese <a href="{{ URL::route('signup') }}"><b>Aquí</b></a></div>

            <div class="login_recover"><a href="#"><b>Recuperar contraseña</b></a></div>
        </div><!--loginboxinner-->
    </div><!--loginbox-->


</body>
</html>
