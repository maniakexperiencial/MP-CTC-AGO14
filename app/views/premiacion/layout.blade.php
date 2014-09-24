<!doctype html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta charset="UTF-8">
   <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0" />-->
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
        <!--<div class="ui one column page grid">-->
        <div class="center_container">
            <div class="column" id="center_topbar">
                <div class="logo"><a href="{{ URL::route('root') }}"><img src="{{ URL::to('/img/logo.png') }}"></a></div>
                <nav id="nav" role="navigation">
                    <a href="#nav" title="Show navigation"><div class="toggle_menu"><i class="reorder icon"></i></div></a>
                    <a href="#" title="Hide navigation"><div class="toggle_menu"><i class="reorder icon"></i></div></a>
                    <ul class="login_ul">
                        <li><a href="{{Url::route('loginUser_route')}}">Login</a></li>
                    </ul>
                    <ul id="">
                        <li>
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
                        <li class="menu_active">
                            <a href="{{ URL::route('premiacion') }}">Premiación</a>
                        </li>
                    </ul>
                </nav>
             </div>


        </div>

    </div>
    <div class="Action_bar">
        <!--<div class="ui one column page grid">-->
        <div class="center_container">
            <div class="column" id="center_actionbar">
                <!--<input type="text" id="Searchbox" placeholder="Search">-->
                @yield('filter')
             </div>
        </div>
    </div>
</header>

<!--<div class="ui one column page grid">-->
<div class="center_container" style="min-height: 100%;height:auto;">

    <div class="column" id="content_wrap">
        <div class="ui grid">
        <div class="row">

            <div class="three wide column" id="Left_bar">

                    <div class="extra_sidebar">
                        @yield('top_sidebar')

                    </div>
                <a href="{{ URL::route('premiacion_ganadores') }}"><img data-alt-src="{{ URL::to('/img/hovers/ganadores.png') }}" border="0" src="{{ URL::to('/img/ganadores.jpg') }}"></a>
                <a href="{{ URL::route('premiacion_galeria') }}"><img data-alt-src="{{ URL::to('/img/hovers/galeria.png') }}" border="0" src="{{ URL::to('/img/galeria.jpg') }}"></a>
                <a href="{{ URL::route('premiacion_videos') }}"><img data-alt-src="{{ URL::to('/img/hovers/video.png') }}"  border="0" src="{{ URL::to('/img/video.jpg') }}"></a>
                <a href="{{ URL::route('premiacion_resumen') }}"><img data-alt-src="{{ URL::to('/img/hovers/resumen.png') }}" border="0" src="{{ URL::to('/img/resumen.jpg') }}"></a>
                <!--<img class="imagen_absoluta" src="{{ URL::to('/img/copa.png') }}">-->
                @yield('bottom_sidebar')

            </div>
            <div class="thirteen wide column ">
                   <div class="Title_section">@yield('title_section')</div>
                    @yield('content_center')
            </div>


        </div>
        </div>

    </div>
</div>
<div class="footer">
    <div class="center_container">
        <div class="column text_right" >
            <a href="{{ URL::to('/documents/PoliticaPrivacidad.pdf') }}" target="_blank" style="padding-right:5px">Política de privacidad</a>
            <a href="{{ URL::to('/documents/Aviso Legal 2014.pdf') }}" target="_blank" style="padding-right:5px">Aviso legal</a>
            <a href="#">Contáctanos</a>
         </div>
        <div class="disclaimer" style="font-size: 10px">
            © Janssen-Cilag S.A. de C.V. 2014.
        </div>
     </div>
</div>
@yield('javacode')

<script type="text/javascript">

    // Running the code when the document is ready
    $(document).ready(function(){
        (function($) {
            $.fn.hasScrollBar = function() {
                return this.get(0).scrollHeight > this.height();
            }
        })(jQuery);
        console.log($("#main").hasScrollBar());
        if ($("body").height() > $(window).height()) {

            $('.footer').css('position','relative');
        }else{
                //console.log($("body").height()+' '+ $(window).height());
            $('.footer').css('position','fixed');
        }
        $(window).resize(function () { /* do something */
            if ($("body").height() > $(window).height()) {
                $('.footer').css('position','relative');
            }else{
                $('.footer').css('position','fixed');
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


            $('#Left_bar img').hover(sourceSwap, sourceSwap);

        ////////////////////////////////CALCULATE HEIGH//////////////////////
        $(window).resize(function() {

            //$('.historia_box').css('height',$(window).height()*.1532175) ;
            $('#Left_bar img').css('max-height',$(window).height()*.14629049);

            $('.bg_adition img').css('max-width',$('#Left_bar').width());
            $('.bg_adition img').css('max-height',$(window).height() *.17578125);
        });



        //
        $('#Left_bar img').css('max-height',$(window).height()*.14629049);

        $('.bg_adition img').css('max-width',$('#Left_bar').width());
        $('.bg_adition img').css('max-height',$(window).height() *.17578125);

    });

</script>
</body>
</html>