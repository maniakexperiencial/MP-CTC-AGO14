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
        <div style="text-align: center;font-size: 24px;margin-top: 20%;font-weight: bold;">Recuperar contraseña</div>
        <p style="margin-top: 5%; text-align: center;font-size: 16px;">
            Se ha enviado un link a tu correo para reestablecer tu contraseña
        </p>
        <div style="text-align: center; width: 100%;">
            <a href="{{ URL::route('loginUser_route') }}"><div class="signup_backbtn" style="float: none;">Regresar</div></a>
        </div>



    </div><!--loginboxinner-->
</div><!--loginbox-->


</body>
</html>
