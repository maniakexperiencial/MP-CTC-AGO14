<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Janssen</title>
{{ HTML::style('/css/style.default.css', array('media' => 'screen')) }}
{{ HTML::script('/js/plugins/jquery-1.7.min.js') }}
{{ HTML::script('/js/plugins/jquery-ui-1.8.16.custom.min.js') }}
{{ HTML::script('/js/plugins/jquery.cookie.js') }}
{{ HTML::script('/js/plugins/jquery.uniform.min.js') }}
{{ HTML::script('/js/plugins/jquery.flot.min.js') }}
{{ HTML::script('/js/plugins/jquery.flot.resize.min.js') }}
{{ HTML::script('/js/plugins/jquery.slimscroll.js') }}
{{ HTML::script('/js/custom/general.js') }}
@yield('scripts')
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/plugins/excanvas.min.js"></script><![endif]-->
<!--[if IE 9]>
<link rel="stylesheet" media="screen" href="css/style.ie9.css"/>
<![endif]-->
<!--[if IE 8]>
<link rel="stylesheet" media="screen" href="css/style.ie8.css"/>
<![endif]-->
<!--[if lt IE 9]>
<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
{{ HTML::style('/css/style_admin.css', array('media' => 'screen')) }}

{{ HTML::style('js/nivo/nivo-lightbox.css') }}
{{ HTML::style('js/nivo/themes/default/default.css') }}
{{ HTML::script('js/nivo/nivo-lightbox.min.js') }}
</head>
<body class="withvernav">
<div class="bg"></div>
<div class="bodywrapper">
    <div class="topheader">
        <div class="left">
            <img style="max-height: 50px" src="{{ URL::to('/img/admin_logo_index.png') }}" >
            <span class="slogan"></span>
            <br clear="all" />
        </div><!--left-->
        <div class="right">
            <div class="user_logout">
                <a href="<?=URL::route('logout')?>"><span>Cerrar sesión</span></a>
            </div><!--userinfo-->
        </div><!--right-->
    </div><!--topheader-->
    <div class="header">
        <ul class="headermenu">
            <li class="current"><a href=""><span class="icon icon-flatscreen"></span>Panel de Control</a></li>
        </ul>
    </div><!--header-->
    <div class="vernav2 iconmenu">
        <ul>
            <li id="m_usuario" class="active"><a href="{{Url::route('dashboard_pd')}}" class="user_icon">Historias</a>
                <!--<span class="arrow"></span>
                <ul id="usersub">
                    <li><a href="">Registrados</a></li>
                    <li><a href="">Solicitudes</a></li>
                </ul>-->
            </li>

        </ul>
        <a class="togglemenu"></a>
        <br /><br />
    </div><!--leftmenu-->
    @yield('content')
</div><!--bodywrapper-->
@yield('jscode')
</body>
</html>
