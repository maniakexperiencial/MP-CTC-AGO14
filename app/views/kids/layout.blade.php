<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta charset="UTF-8">
    <title>Laravel PHP Framework</title>

    {{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js', array('media' => 'screen')) }}



    {{ HTML::style('css/semantic.min.css') }}
    {{ HTML::style('css/semantic.css') }}

    {{ HTML::style('css/style.css') }}

    {{ HTML::script('js/semantic.js', array('media' => 'screen')) }}
    {{ HTML::script('js/semantic.min.js', array('media' => 'screen')) }}




    @yield('scripts')



</head>
<body id="main">
<!--<nav class="ui menu">
    <h3 class="header item">Title</h3>
    <a class="active item">Home</a>
    <a class="item">Link</a>
    <a class="item">Link</a>
  <span class="right floated te<nav>
    <div class="Topbar">

    </div>

</nav><nav>
    <div class="Topbar">

    </div>

</nav><nav>
    <div class="Topbar">

    </div>

</nav>xt item">
    Signed in as <a href="#">user</a>
  </span>
</nav>-->
<header>
    <div class="Topbar">
        <div class="ui one column page grid">
            <div class="column" id="center_topbar">
                <div class="logo"><a href="{{ URL::route('root') }}"><img src="{{ URL::to('/img/logo.png') }}"></a></div>
                <nav id="nav" role="navigation">
                    <a href="#nav" title="Show navigation">Show navigation</a>
                    <a href="#" title="Hide navigation">Hide navigation</a>
                    <ul id="">
                        <li>
                            <a href="{{ URL::route('root') }}">Home</a>
                        </li>
                        <li>
                            <a href="{{ URL::route('kids') }}">Niños</a>
                        </li>
                        <li>
                            <a href="#">Papás</a>
                        </li>
                        <li>
                            <a href="#">Médicos</a>
                        </li>
                        <li>
                            <a href="#">Premiación</a>
                        </li>
                    </ul>
                </nav>
             </div>


        </div>

    </div>
    <div class="Action_bar">
        <div class="ui one column page grid">
            <div class="column" id="center_actionbar">
                <input type="text" id="Searchbox" placeholder="Search">
                <select id="Selectbox">
                    <option value="volvo">Volvo</option>
                    <option value="saab">Saab</option>
                    <option value="mercedes">Mercedes</option>
                    <option value="audi">Audi</option>
                </select>
             </div>
        </div>
    </div>
</header>

<div class="ui one column page grid">
    <div class="column" id="content_wrap">
        <div class="ui grid">
        <div class="row">
            <div class="four wide column">
                <div class="Title_section"></div>
                <a href="{{ URL::route('kids_cuentos') }}"><img src="{{ URL::to('/img/cuentos.jpg') }}"></a>
                <a href="{{ URL::route('kids_videos') }}"><img src="{{ URL::to('/img/video.jpg') }}"></a>
                <a href="{{ URL::route('kids_bases') }}"><img src="{{ URL::to('/img/bases.jpg') }}"></a>

            </div>
            <div class="twelve wide column ">
                   <div class="Title_section">@yield('title_section')</div>
                    @yield('content_center')
            </div>


        </div>
        </div>

    </div>
</div>
<div class="footer">
    <div class="ui one column page grid">
        <div class="column" >
            contactanos
         </div>
     </div>
</div>
@yield('javacode')
</body>
</html>