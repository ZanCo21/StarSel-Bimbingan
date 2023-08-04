<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> StarSel </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/landing-page/favicon.ico">

	<!-- CSS here -->
	<link rel="stylesheet" href="assets/css/landing-page/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/landing-page/owl.carousel.min.css">
	<link rel="stylesheet" href="assets/css/landing-page/slicknav.css">
    <link rel="stylesheet" href="assets/css/landing-page/flaticon.css">
    <link rel="stylesheet" href="assets/css/landing-page/gijgo.css">
    <link rel="stylesheet" href="assets/css/landing-page/animate.min.css">
    <link rel="stylesheet" href="assets/css/landing-page/animated-headline.css">
	<link rel="stylesheet" href="assets/css/landing-page/magnific-popup.css">
	<link rel="stylesheet" href="assets/css/landing-page/themify-icons.css">
	<link rel="stylesheet" href="assets/css/landing-page/slick.css">
	<link rel="stylesheet" href="assets/css/landing-page/nice-select.css">
	<link rel="stylesheet" href="assets/css/landing-page/style.css">

	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>
    <!-- ? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/images/landing-page/logo/icons8-star-96.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
<header>
    <!--? Header Start -->
    <div class="header-area">
        <div class="main-header header-sticky">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <!-- Logo -->
                    <div class="col-xl-2 col-lg-2 col-md-1">
                        <div class="logo">
                            <div class="section-tittle section-tittle2">
                                <h2>Starsel.</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-10 col-md-10">
                        <div class="menu-main d-flex align-items-center justify-content-end">
                            <!-- Main-menu -->
                            <div class="main-menu f-right d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="#home">Home</a></li>
                                        <li><a href="#about">About</a></li>
                                        <li><a href="#gurubk">Teacher</a></li>
                                        <li><a href="#news">News</a>
                                            <!-- <ul class="submenu">
                                                <li><a href="blog.html">Blog</a></li>
                                                <li><a href="blog_details.html">Blog Details</a></li>
                                                <li><a href="elements.html">Element</a></li>
                                            </ul> -->
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            @if(auth()->check())
                            <!-- Pengguna sudah login -->
                            <div class="header-right-btn f-right d-none d-lg-block ml-30">
                                <a href="/{{ $cek->role }}/dashboard" class="btn header-btn">Dashboard</a>
                            </div>
                        @else
                            <!-- Pengguna belum login -->
                            <div class="header-right-btn f-right d-none d-lg-block ml-30">
                                <a href="/login-regis" class="btn header-btn">Login</a>
                            </div>
                        @endif
                        </div>
                    </div>   
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>
<main>
    <!--? slider Area Start-->
    <div class="slider-area position-relative" id="home">
        <div class="slider-active">
            <!-- Single Slider -->
            <div class="single-slider slider-height d-flex align-items-center" style="background: url('https://i.postimg.cc/htFf0YrG/header2.png');object-fit: cover;width: 100%;background-size: cover">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-7 col-lg-9 col-md-8 col-sm-9">
                            <div class="hero__caption">
                                <span>Committed to success</span>
                                <h1 class="cd-headline letters scale">We care about your 
                                    <strong class="cd-words-wrapper">
                                        <b class="is-visible">health</b>
                                        <b>problem</b>
                                        <b>privacy</b>
                                    </strong>
                                </h1>
                                <p data-animation="fadeInLeft" data-delay="0.1s">Selamat datang di StartSel. Bergabunglah dengan StartsEl sekarang dan dapatkan konsultasi sekolah yang Anda butuhkan.</p>
                                <a href="#" class="btn hero-btn" data-animation="fadeInLeft" data-delay="0.5s">More <box-icon name='right-arrow-alt'></box-icon></a>
                            </div>
                        </div>
                    </div>
                </div>          
            </div>
            <!-- Single Slider -->
            <div class="single-slider slider-height d-flex align-items-center" style="background: url('https://i.postimg.cc/htFf0YrG/header2.png');object-fit: cover;width: 100%; background-size: cover">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-7 col-lg-9 col-md-8 col-sm-9">
                            <div class="hero__caption">
                                <span>Committed to success</span>
                                <h1 class="cd-headline letters scale">We care about your 
                                    <strong class="cd-words-wrapper">
                                        <b class="is-visible">health</b>
                                        <b>problem</b>
                                        <b>privacy</b>
                                    </strong>
                                </h1>
                                <p data-animation="fadeInLeft" data-delay="0.1s">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi uquip ex ea commodo consequat is aute irure.</p>
                                <a href="#" class="btn hero-btn" data-animation="fadeInLeft" data-delay="0.5s">Appointment <box-icon name='right-arrow-alt'></box-icon></a>
                            </div>
                        </div>
                    </div>
                </div>          
            </div>
        </div>
    </div>
    <!-- slider Area End-->
    <!--? About Start-->
    <div class="about-area section-padding2" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-10">
                    <div class="about-caption mb-50">
                        <!-- Section Tittle -->
                        <div class="section-tittle section-tittle2 mb-35">
                            <span>Starsel</span>
                            <h2>About Starsel</h2>
                        </div>
                        <p>StarSel adalah aplikasi layanan konseling yang siap memberikan dukungan emosional, penyelesaian masalah, dan pertumbuhan pribadi bagi setiap individu. Kami hadir dengan kebijaksanaan, empati, dan menjaga kerahasiaan Anda sepenuhnya.</p>
                        <div class="about-btn1 mb-30">
                            <a href="about.html" class="btn about-btn">Read More<i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <!-- about-img -->
                    <div class="about-img ">
                        <div class="about-font-img d-none d-lg-block">
                            <img src="assets/images/landing-page/blog/about-ilust.png" alt="" width="500">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About  End-->

    <!-- service overings start -->
    
    <!-- service overings end -->

     <!--? Team Start -->
     <div style="background: #F7FDFF;" class="team-area section-padding30" id="gurubk">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-tittle text-center mb-100">
                        <span>Bk Teacher</span>
                        <h2>Our Bk Teacher</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- single Tem -->
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-">
                    <div class="single-team mb-30">
                        <div class="team-img">
                            <img src="assets/images/landing-page/gallery/team2.png" alt="">
                        </div>
                        <div class="team-caption">
                            <h3><a href="#">Ricky Sudrajat</a></h3>
                            <span>Guru Konseling</span>
                            
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-">
                    <div class="single-team mb-30">
                        <div class="team-img">
                            <img src="assets/images/landing-page/gallery/team3.png" alt="">
                        </div>
                        <div class="team-caption">
                            <h3><a href="#">Caca Kasandra</a></h3>
                            <span>Guru Konseling</span>
                            
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-">
                    <div class="single-team mb-30">
                        <div class="team-img">
                            <img src="assets/images/landing-page/gallery/team1.png" alt="">
                        </div>
                        <div class="team-caption">
                            <h3><a href="#">Muhammad Ariq</a></h3>
                            <span>Guru Konseling</span>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->
      
    <!--? Blog start -->
    <div class="home_blog-area section-padding30" id="news">
        <div class="container">
            <div class="row justify-content-sm-center">
                <div class="cl-xl-7 col-lg-8 col-md-10">
                    <!-- Section Tittle -->
                    <div class="section-tittle text-center mb-70">
                        <span>Our recent news</span>
                        <h2>Our News From Blog</h2>
                    </div> 
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-blogs mb-30">
                        <div class="blog-img">
                            <img src="assets/images/landing-page/post/jangantakut.jpeg" alt="">
                        </div>
                        <div class="blogs-cap">
                            <div class="date-info">
                                <span>NEWS</span>
                                <p>Nov 30, 2020</p>
                            </div>
                            <h4><a href="blog_details.html">Jangan Takut Dibenci Orang Lain: Kuatkan Mental dan Emosi</a></h4>
                            <a href="blog_details.html" class="read-more1">Read more</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-blogs mb-30">
                        <div class="blog-img">
                            <img src="assets/images/landing-page/post/insec.jpeg" alt="">
                        </div>
                        <div class="blogs-cap">
                            <div class="date-info">
                                <span>NEWS</span>
                                <p>Nov 30, 2020</p>
                            </div>
                            <h4><a href="blog_details.html">Mengenal Apa itu Insecure dan Cara Efektif untuk Mengatasinya</a></h4>
                            <a href="blog_details.html" class="read-more1">Read more</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-blogs mb-30">
                        <div class="blog-img">
                            <img src="assets/images/landing-page/post/ovt.jpg" alt="">
                        </div>
                        <div class="blogs-cap">
                            <div class="date-info">
                                <span>NEWS</span>
                                <p>Nov 30, 2020</p>
                            </div>
                            <h4><a href="blog_details.html">Kenali Tipe-Tipe Overthinking dan Cara Mengatasinya</a></h4>
                            <a href="blog_details.html" class="read-more1">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->
    </main>
    <footer>
        <!--? Footer Start-->
        <div class="footer-area section-bg" data-background="assets/images/landing-page/gallery/footer_bg.jpg">
            <div class="container">
                <div class="footer-top footer-padding">
                    <div class="row d-flex justify-content-between">
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-8">
                            <div class="single-footer-caption mb-50">
                                <!-- logo -->
                                <div class="footer-logo">
                                    <div class="section-tittle section-tittle2" >
                                        <h2 style="color: white">Starsel.</h2>
                                    </div>
                                </div>
                                <div class="footer-pera">
                                  
                                    <p class="info1">StarSel adalah aplikasi layanan konseling yang menyediakan dukungan emosional, penyelesaian masalah, dan pertumbuhan pribadi. </p>
                                    <p class="info1">Kami menawarkan kebijaksanaan, empati, dan kerahasiaan yang sepenuhnya terjaga.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-4 col-md-6 col-sm-5">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>About Us</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-4 col-md-6 col-sm-5">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Teacher</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-4 col-md-6 col-sm-5">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>News</h4>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-xl-4 col-lg-4 col-md-6 col-sm-8">
                            <div class="single-footer-caption footer-tittle mb-50">
                                
                            </div>
                        </div> -->
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="col-xl-9 col-lg-8">
                            <div class="footer-copy-right">
                                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    © 2023 SMK Taruna Bhakti. All right reserved</p>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4">
                            <!-- Footer Social -->
                            <div class="footer-social f-right">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="https://www.facebook.com/sai4ull"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fas fa-globe"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->
    </footer>
    <!-- Scroll Up -->
    <div id="back-top" >
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>

    <!-- JS here -->

    <script src="./assets/js/landing-page/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="./assets/js/landing-page/vendor/jquery-1.12.4.min.js"></script>
    <script src="./assets/js/landing-page/popper.min.js"></script>
    <script src="./assets/js/landing-page/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="./assets/js/landing-page/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="./assets/js/landing-page/owl.carousel.min.js"></script>
    <script src="./assets/js/landing-page/slick.min.js"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="./assets/js/landing-page/wow.min.js"></script>
    <script src="./assets/js/landing-page/animated.headline.js"></script>
    <script src="./assets/js/landing-page/jquery.magnific-popup.js"></script>

    <!-- Date Picker -->
    <script src="./assets/js/landing-page/gijgo.min.js"></script>
    <!-- Nice-select, sticky -->
    <script src="./assets/js/landing-page/jquery.nice-select.min.js"></script>
    <script src="./assets/js/landing-page/jquery.sticky.js"></script>
    
    <!-- counter , waypoint -->
    <script src="./assets/js/landing-page/jquery.counterup.min.js"></script>
    <script src="./assets/js/landing-page/waypoints.min.js"></script>
    <script src="./assets/js/landing-page/jquery.countdown.min.js"></script>
    <!-- contact js -->
    <script src="./assets/js/landing-page/contact.js"></script>
    <script src="./assets/js/landing-page/jquery.form.js"></script>
    <script src="./assets/js/landing-page/jquery.validate.min.js"></script>
    <script src="./assets/js/landing-page/mail-script.js"></script>
    <script src="./assets/js/landing-page/jquery.ajaxchimp.min.js"></script>
    
    <!-- Jquery Plugins, main Jquery -->	
    <script src="./assets/js/landing-page/plugins.js"></script>
    <script src="./assets/js/landing-page/main.js"></script>
    
    </body>
</html>