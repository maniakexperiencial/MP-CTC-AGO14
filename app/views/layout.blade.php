<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Janssen</title>

    {{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js', array('media' => 'screen')) }}



    {{ HTML::style('css/semantic.min.css') }}
    {{ HTML::style('css/semantic.css') }}

    {{ HTML::style('css/style.css') }}

    {{ HTML::script('js/semantic.js', array('media' => 'screen')) }}
    {{ HTML::script('js/semantic.min.js', array('media' => 'screen')) }}
    {{ HTML::script('js/jQueryRotate3.js', array('media' => 'screen')) }}



    @yield('scripts')



</head>
<body id="main">
@yield('bg_move')
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
        <div class="center_container">
            <div class="column" id="center_topbar">
                <div class="logo"><a href="{{ URL::route('root') }}"><img src="{{ URL::to('/img/logo.png') }}"></a></div>
                <nav id="nav" role="navigation">
                    <a href="#nav" title="Show navigation"><div class="toggle_menu"><i class="reorder icon"></i></div></a>
                    <a href="#" title="Hide navigation"><div class="toggle_menu"><i class="reorder icon"></i></div></a>
                    <ul id="">
                       <!-- <li>
                            <a href="{{ URL::route('root') }}">Home</a>
                        </li>
                        <li>
                            <a href="{{ URL::route('kids') }}">Niños</a>
                        </li>
                        <li>
                            <a href="{{ URL::route('papas') }}">Papás</a>
                        </li>
                        <li>
                            <a href="{{ URL::route('doctores') }}">Médicos</a>
                        </li>
                        <li>
                            <a href="{{ URL::route('premiacion') }}">Premiación</a>
                        </li>-->
                    </ul>
                </nav>
            </div>


        </div>

    </div>
    <div class="Action_bar">
        <div class="center_container">
            <div class="column" id="center_actionbar">
                <input type="text" id="Searchbox" placeholder="Search">
                <select id="Selectbox">
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                </select>
            </div>
        </div>
    </div>
</header>

<div class="center_container">
    <div class="column" id="content_wrap">
        <div class="ui grid">
            <div class="row" style="margin-top: 5%">

                <div class="sixteen wide column align_center  align_center_moreheight ">
                    <div class="Title_section">@yield('title_section')</div>
                    @yield('content_center')
                </div>


            </div>
            <div class="row">

                <div class="three wide column align_center ">


                </div>
                <div class="five wide column align_center   ">
                    @yield('contest1')



                </div>
                <div class="five wide column align_center ">
                    @yield('contest2')

                </div>
                <div class="three wide column align_center ">


                </div>


            </div>
            <div class="row">
                <div class="four wide column align_center ">


                </div>
                <div class="four wide column align_center   ">

                    @yield('contest3')


                </div>
                <div class="four wide column align_center ">

                    @yield('contest4')
                </div>
                <div class="four wide column align_center ">


                </div>
            </div>
        </div>

    </div>
</div>
<div class="footer">
    <div class="center_container">
        <div class="column text_right" >
            <a href="#">Contáctanos</a>
        </div>
    </div>
</div>
@yield('javacode')

<script type="text/javascript">

    // Running the code when the document is ready
    $(document).ready(function(){
        if ($("body").height() > $(window).height()) {
            $('.footer').css('position','relative');

        }
        $(window).resize(function () { /* do something */
            if ($("body").height() > $(window).height()) {
                $('.footer').css('position','relative');
            }else{
                $('.footer').css('position','absolute');
            }
        });

        ////PAPALOTE LOOP//
        /* function loop_papalote() {

         $('.papalote').animate ({
         right: '+=20'
         }, 300, 'linear', function() {
         $('.papalote').animate ({
         top: '+=20'
         }, 300, 'linear', function() {
         $('.papalote').animate ({
         right: '-=20'
         }, 300, 'linear', function() {

         $('.papalote').animate ({
         top: '-=20'
         }, 300, 'linear', function() {
         loop_papalote();
         });
         });
         });
         });
         }
         loop_papalote();*/

        ///SOL LOOP///
        function loop_sol() {
            var angle = 0;
            setInterval(function(){
                angle+=3;
                $(".extra_sidebar img").rotate(angle);
            },50);
        }
        loop_sol();


        //HOVER EVENTS//
        var sourceSwap = function () {
            var $this = $(this);
            var newSource = $this.data('alt-src');
            $this.data('alt-src', $this.attr('src'));
            $this.attr('src', newSource);
        }


     $('#center_actionbar').hide();

    });

</script>

</body>
</html>