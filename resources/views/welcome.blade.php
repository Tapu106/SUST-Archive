<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Unicat project">
        <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
        <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="plugins/colorbox/colorbox.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
        <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
        <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">

        <title>SUST Archive</title>
        <link rel="icon" href="images/title_icon.jpg" type="image/png">
        <link rel="stylesheet" type="text/css" href="styles/about.css"> 
        <link rel="stylesheet" type="text/css" href="styles/about_responsive.css">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>


            
        </style>
    </head>

    <body style="background-image:url(images/img001.jpg);">
    <div class="super_container">
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
            <div class="top-right links">
                @auth
                <a href="{{ url('/home') }}" style="color: #636b6f !important ; font-weight: bold !important;">Home</a>
                @else
                    <a href="{{ route('login') }}"style="color: #636b6f !important ; font-weight: bold !important;">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"style="color: #636b6f !important ; font-weight: bold !important;">Register</a>
                        @endif
                        @endauth
            </div>
            @endif

            <div class="content" >
                <div class="title m-b-md" style="color: #939b9f !important ;">
                    SUST <span  >Archive</span>
                </div>
                <div class="links">
                    <!--<a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>-->
                </div>
            </div>
        </div>

        <!-- Footer -->

        <footer class="footer">
        <div class="footer_background" style="background-image:url(images/footer_background.png)"></div>
        <div class="container">
            <div class="row footer_row">
                <div class="col">
                    <div class="footer_content">
                        <div class="row">

                            <div class="col-lg-3 footer_col">
                    
                                <!-- Footer About -->
                                <div class="footer_section footer_about">
                                    <div class="footer_logo_container">
                                        <a href="#">
                                            <div class="footer_logo_text">SUST <span>Archive</span></div>
                                        </a>
                                    </div>
                                    <div class="footer_about_text">
                                        <p></p>
                                    </div>
                                    <div class="footer_social">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                
                            </div>

                            <div class="col-lg-3 footer_col">
                    
                                <!-- Footer Contact -->
                                <div class="footer_section footer_contact">
                                    <div class="footer_title">Contact Us</div>
                                    <div class="footer_contact_info">
                                        <ul>
                                            <li>Email: adress@gmail.com</li>
                                            <li>Phone:  +(88) 017 xxx xxx</li>
                                            <li>Surma R/A, Akhalia, Sylhet City, Bangladesh</li>
                                        </ul>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="col-lg-3 footer_col">
                    
                                <!-- Footer links 
                                <div class="footer_section footer_links">
                                    <div class="footer_title">Contact Us</div>
                                    <div class="footer_links_container">
                                        <ul>
                                            <li><a href="index.html">Home</a></li>
                                            <li><a href="about.html">About</a></li>
                                            <li><a href="contact.html">Contact</a></li>
                                            <li><a href="#">Features</a></li>
                                            <li><a href="courses.html">Courses</a></li>
                                            <li><a href="#">Events</a></li>
                                            <li><a href="#">Gallery</a></li>
                                            <li><a href="#">FAQs</a></li>
                                        </ul>
                                    </div>
                                </div>
                                -->
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>


    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="styles/bootstrap4/popper.js"></script>
    <script src="styles/bootstrap4/bootstrap.min.js"></script>
    <script src="plugins/greensock/TweenMax.min.js"></script>
    <script src="plugins/greensock/TimelineMax.min.js"></script>
    <script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
    <script src="plugins/greensock/animation.gsap.min.js"></script>
    <script src="plugins/greensock/ScrollToPlugin.min.js"></script>
    <script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="plugins/easing/easing.js"></script>
    <script src="plugins/parallax-js-master/parallax.min.js"></script>
    <script src="plugins/colorbox/jquery.colorbox-min.js"></script>
    <script src="js/about.js"></script>
    </body>
</html>
