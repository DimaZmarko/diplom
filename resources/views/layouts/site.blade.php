<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>Diplom For NLTU</title>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,500,500i,700,700i,900,900i"
          rel="stylesheet">

    <!--[if lt IE 10]>
    <link rel="stylesheet" href="https://rawgit.com/codefucker/finalReject/master/reject/reject.css" media="all"/>
    <script type="text/javascript" src="https://rawgit.com/codefucker/finalReject/master/reject/reject.min.js"></script>
    <![endif]-->
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="{{asset('css/basic.css')}}">
    <link rel="stylesheet" href="{{asset('css/main_styles.css')}}">
    <link rel="stylesheet" href="{{asset('css/main_adapt.css')}}">
    <link rel="stylesheet" href="{{asset('css/new.css')}}">
    <link rel="stylesheet" href="{{asset('css/new_style.css')}}">
    <link rel="stylesheet" href="{{asset('css/Xcustom.css')}}">
    <link rel="stylesheet" href="{{asset('css/Xcustom_adapt.css')}}">
    <link rel="stylesheet" href="{{asset('css/znormalize.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery.fancybox.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('css/new_admin.css')}}">
    <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
</head>
<body>
<div id="p_prldr" style="z-index: 999999999">
    <div class="contpre">
        <span class="svg_anm"></span>
    </div>
</div>

<div class="global-wrapper">
    <header>
        <div class="siders">
            <div class="logo-part">
                <a href="/">
                    <img src="{{asset('images/logo.png')}}" alt="">
                </a>
            </div>
            <div class="nav_content">
                <div class="navigate-part">
                    <nav>
                        <ul>
                            <li>About</li>
                            <li>Main page</li>
                        </ul>
                    </nav>
                </div>
                <div class="logo-part_nav">
                    <a href="/">
                        <img src="{{asset('images/logo.png')}}" alt="">
                    </a>
                </div>
                <div class='header_log_btn'>
                    <a data-fancybox data-src="#create-new" href="javascript:;" class="contact_btn_header">
                        <span> Contact </span>
                    </a>


                    <a href="#" class="add-butt">
                        <span>Log out</span>
                    </a>

                    <a href="#" class="add-butt" style="display: none">
                        <span> My account</span>
                    </a>

                    <a data-fancybox data-src="#login-form" href="javascript:;" class="add-butt">
                        <span>Log in</span>
                    </a>
                </div>

                <div class="heder_ico" id="header_ico" onclick="this.classList.toggle('active_mnu');"
                     style="display: none">
                    <i class="fas fa-bars"></i>
                    <!--Burger menu-->
                    <svg class="ham ham6" viewBox="0 0 100 100" width="80" onclick="this.classList.toggle('active');">
                        <path
                                class="line top"
                                d="m 30,33 h 40 c 13.100415,0 14.380204,31.80258 6.899646,33.421777 -24.612039,5.327373 9.016154,-52.337577 -12.75751,-30.563913 l -28.284272,28.284272"/>
                        <path
                                class="line middle"
                                d="m 70,50 c 0,0 -32.213436,0 -40,0 -7.786564,0 -6.428571,-4.640244 -6.428571,-8.571429 0,-5.895471 6.073743,-11.783399 12.286435,-5.570707 6.212692,6.212692 28.284272,28.284272 28.284272,28.284272"/>
                        <path
                                class="line bottom"
                                d="m 69.575405,67.073826 h -40 c -13.100415,0 -14.380204,-31.80258 -6.899646,-33.421777 24.612039,-5.327373 -9.016154,52.337577 12.75751,30.563913 l 28.284272,-28.284272"/>
                    </svg>
                    <!--End Burger Menu -->
                </div>
            </div>
        </div>
    </header>

</div>
@yield('content')

<?php
//    $blog_url= get_bloginfo( 'template_directory' );
?>


<?php
//    get_template_part( 'parts/hidden', 'block' );
?>

<footer class="footer">
    <div class="popup_donors">


    </div>
    <div class="mbox">
        <div class="topper">
            <div class="cols">
                <div class="col">

                </div>
                <div class="col">
                    <div class="texter">
                        <h4>
                            Footer text center
                        </h4>
                        <p>
                            Footer long text
                        </p>
                    </div>
                    <div class="after">
                        <div class="pay">
                            <div class="icons">
                                <img src="{{asset('images/stack-pay1.png')}}" alt="">
                            </div>
                            <div class="after-text">
                                Footer payment text
                            </div>
                        </div>
                        <div class="footer_credit_cart">
                            <p>Credit Cart</p>
                        </div>
                    </div>
                </div>
                <div class="col">

                    <div class="after-button">
                        <a data-fancybox data-src="#create-new" href="javascript:;" class="add-butt">
                            <span>
                                contact
                            </span>
                        </a>
                        <p> TERMS OF USE </p>
                        <div class="ssl">
                            <div class="icons">
                                <img src="{{asset('images/stack-pay2.png')}}" alt="">
                            </div>
                            <div class="after-text">
                                Footer ssl text
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <div class="botter">
            <div class="siders">
                <div class="copiright">
                    Copyright row
                </div>
                <a href="https://www.linkedin.com/in/dymytrii-zmarko-3662a5140/" target="_blank" class="creators">
                    Created by Dymytrii Zmarko </a>
            </div>
        </div>
    </div>

    <script src="{{asset('js/plugins/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('js/plugins/jquery-ui.min.js')}}"></script>
    <script src="{{asset('js/plugins/jquery.fancybox.min.js')}}"></script>
    <script src="{{asset('js/plugins/jquery.validate.min.js')}}"></script>
    <script src="{{asset('js/plugins/slick.js')}}"></script>
    <script src="{{asset('js/plugins/maskInput.js')}}"></script>
    <script src="{{asset('js/plugins/select2.js')}}"></script>
    <script src="{{asset('js/plugins/sticky.js')}}"></script>
    <script src="{{asset('js/validate_script.js')}}"></script>
    <script src="{{asset('js/basic_scripts.js')}}"></script>
    <script src="{{asset('js/develop/custom.js')}}"></script>
    <script src="{{asset('js/develop/main.js')}}"></script>
    <script src="{{asset('js/develop/new_app.js')}}"></script>

</footer>
</body>
</html>






