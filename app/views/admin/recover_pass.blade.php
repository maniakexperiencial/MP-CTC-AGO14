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

<body class="loginpage  signup_bg">
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
	<div class="loginbox">
    	<div class="loginboxinner">

            <div class="logo">
                <img src="{{ URL::to('/img/admin_logo_index.png') }}">
            	<!--<h1><span>AMAN.</span>DA</h1>
                <p>premium admin template</p>-->
            </div><!--logo-->

            <br clear="all" /><br />



            {{ Form::open(['route' => 'recovpass_route']) }}
            @if (Session::has('mensaje_request'))
            {{ Session::get('mensaje_request') }}
            @endif

            <div class="form-group">
                {{Form::label('email', 'CORREO ELECTRÓNICO', ['class' => 'login_label']) }}
                {{Form::email('email', null, ['class' => 'login_blue','id'=>'email']) }}
                {{$errors->first('email',"<span class=error>:message</span>")}}

            </div>

                <button>Mandar correo</button>



            {{Form::close()}}

            <div style="margin-bottom: 15%;">&nbsp;</div>


        </div><!--loginboxinner-->
    </div><!--loginbox-->


</body>
</html>
