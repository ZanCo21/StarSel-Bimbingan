<!DOCTYPE html>
<html>
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>KonsultasiBK</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="assets/css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="assets/css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="assets/images/fevicon.png" type="assets/image/gif" />
      <!-- font css -->
      <link href="https://fonts.googleapis.com/css2?family=Sen:wght@400;700;800&display=swap" rel="stylesheet">
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   </head>
   <body>
      <div class="header_section">
         <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
               <a class="navbar-brand"><img width="22%" src="assets/images/logo/logo.png"></a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                     <li class="nav-item active">
                        <a class="nav-link" href="index.html">Home</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="about.html">About</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact Us</a>
                     </li>
                  </ul>
                  <form class="form-inline my-2 my-lg-0">
                     <div class="login_bt">
                        @if (Auth::user())
                            
                        @else
                        <ul>
                           <li><a href="/login-regis"><span class="user_icon"><i class="fa fa-user" aria-hidden="true"></i></span>Login</a></li>
                           <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                        </ul>
                        @endif
                     </div>
                  </form>
               </div>
            </nav>
         </div>
         <!-- banner section start --> 
         <div class="banner_section layout_padding">
            <div class="container-fluid">
               <div id="banner_slider" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                     <div class="carousel-item active">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="banner_taital_main">
                                 <h1 class="banner_taital">Guiding Students Towards a Bright Future</h1>
                                 <p class="banner_text">we are dedicated to guiding and assisting students in their journey towards a bright future. We provide the necessary resources, information, and counseling to help them overcome challenges, discover their interests, and unlock their full potential. </p>
                                 <div class="readmore_btn active"><a href="#">Read More</a></div>
                                 <div class="started_bt"><a href="#">Contact Us</a></div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="banner_img"><img src="assets/images/logo/logo.png"></div>
                           </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="banner_taital_main">
                                 <h1 class="banner_taital">Guiding Students Towards a Bright Future</h1>
                                 <p class="banner_text">we are dedicated to guiding and assisting students in their journey towards a bright future. We provide the necessary resources, information, and counseling to help them overcome challenges, discover their interests, and unlock their full potential. </p>
                                 <div class="readmore_btn active"><a href="#">Read More</a></div>
                                 <div class="started_bt"><a href="#">Contact Us</a></div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="banner_img"><img src="assets/images/logo/logo.png"></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <a class="carousel-control-prev" href="#banner_slider" role="button" data-slide="prev">
                  <i class="fa fa-arrow-left"></i>
                  </a>
                  <a class="carousel-control-next" href="#banner_slider" role="button" data-slide="next">
                  <i class="fa fa-arrow-right"></i>
                  </a>
               </div>
            </div>
         </div>
         <!-- banner section end -->
      </div>
      <!-- header section end -->
     
      <!-- services section start -->
      <div class="services_section">
         <div class="container">
            <div class="row">
               <div class="col-sm-12">
                  <h1 class="studies_taital">SERVICE OFFERINGS</h1>
               </div>
            </div>
         </div>
         <div class="services_section_2">
            <div id="main_slider" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="container">
                        <div class="row">
                           <div class="col-md-4">
                              <div class="service_box">
                                 <div class="house_icon">
                                    <img src="assets/images/icon-1.png" class="assets/image_1">
                                    <img src="assets/images/icon-4.png" class="assets/image_2">
                                 </div>
                                 <h3 class="corporate_text">Individual Counseling  Sessions</h3>
                                 <p class="chunks_text">Our professional counselors provide one-on-one counseling sessions tailored to meet the unique needs of each individual. </p>
                                 <div class="readmore_button"><a href="#">Read More</a></div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="service_box active">
                                 <div class="house_icon">
                                    <img src="assets/images/icon-5.png" class="assets/image_1">
                                    <img src="assets/images/icon-5.png" class="assets/image_2">
                                 </div>
                                 <h3 class="corporate_text">Career Guidance and Planning </h3>
                                 <p class="chunks_text">We offer comprehensive career guidance services to help students make informed decisions about their future career paths.  </p>
                                 <div class="readmore_button active"><a href="#">Read More</a></div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="service_box">
                                 <div class="house_icon">
                                    <img src="assets/images/icon-3.png" class="assets/image_1">
                                    <img src="assets/images/icon-6.png" class="assets/image_2">
                                 </div>
                                 <h3 class="corporate_text">Academic Support and Study Skills</h3>
                                 <p class="chunks_text">We understand the challenges that students face academically. and we help students improve preparation techniques for the world of work. </p>
                                 <div class="readmore_button" ><a href="#">Read More</a></div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="container">
                        <div class="row">
                           <div class="col-md-4">
                              <div class="service_box">
                                 <div class="house_icon">
                                    <img src="assets/images/icon-1.png" class="assets/image_1">
                                    <img src="assets/images/icon-4.png" class="assets/image_2">
                                 </div>
                                 <h3 class="corporate_text">Individual Counseling  Sessions</h3>
                                 <p class="chunks_text">Our professional counselors provide one-on-one counseling sessions tailored to meet the unique needs of each individual. </p>
                                 <div class="readmore_button"><a href="#">Read More</a></div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="service_box active">
                                 <div class="house_icon">
                                    <img src="assets/images/icon-5.png" class="assets/image_1">
                                    <img src="assets/images/icon-5.png" class="assets/image_2">
                                 </div>
                                 <h3 class="corporate_text">Career Guidance and Planning </h3>
                                 <p class="chunks_text">We offer comprehensive career guidance services to help students make informed decisions about their future career paths.  </p>
                                 <div class="readmore_button active"><a href="#">Read More</a></div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="service_box">
                                 <div class="house_icon">
                                    <img src="assets/images/icon-3.png" class="assets/image_1">
                                    <img src="assets/images/icon-6.png" class="assets/image_2">
                                 </div>
                                 <h3 class="corporate_text">Academic Support and Study Skills</h3>
                                 <p class="chunks_text">We understand the challenges that students face academically. and we help students improve preparation techniques for the world of work. </p>
                                 <div class="readmore_button" ><a href="#">Read More</a></div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
               <i class="fa fa-arrow-left"></i>
               </a>
               <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
               <i class="fa fa-arrow-right"></i>
               </a>
            </div>
         </div>
      </div>
      <!-- services section end -->
      <!-- studies section start -->
      <div class="studies_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-sm-12">
               </div>
            </div>
            <div class="studies_section_2">
               <div class="row">
               </div>
            </div>
         </div>
      </div>
      <!-- studies section end -->
      <!-- about section start -->
      <div class="about_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <div class="about_img"><img src="assets/images/about-img.png"></div>
               </div>
               <div class="col-md-6">
                  <div class="about_text_main">
                     <h1 class="about_taital">About Us</h1>
                     <p class="about_text">At SMK TARUNA BHAKTI, we are passionate about providing comprehensive guidance and support to students in their personal and academic growth. With a team of dedicated professionals, we strive to make a positive impact on the lives of students by offering a range of services and resources.</p>
                     <div class="readmore_bt"><a href="#">Read More</a></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- about section end -->
      <!-- testimonial section start -->
      <div class="customer_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-sm-12">
                  <h1 class="customer_taital">School Counselor</h1>
               </div>
            </div>
         </div>
         <div id="my_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <div class="customer_section_2">
                     <div class="container">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="box_main">
                                 <div class="customer_main">
                                    <div class="customer_left">
                                       <div class="customer_img"><img src="assets/images/final1.png" width="80%"></div>
                                    </div>
                                    <div class="customer_right">
                                       <h3 class="customer_name">Jamal <span class="quick_icon"><img src="assets/images/quick-icon.png"></span></h3>
                                       <p class="enim_text">aTo empower and guide students towards personal growth, academic success, and emotional well-being, leveraging a student-centered approach and comprehensive counseling strategies. Our aim is to nurture resilient individuals who are equipped with the necessary skills and support to thrive in their educational journey and beyond.</p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="carousel-item">
                  <div class="customer_section_2">
                     <div class="container">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="box_main">
                                 <div class="customer_main">
                                    <div class="customer_left">
                                       <div class="customer_img"><img src="assets/images/final1.png" width="80%"></div>
                                    </div>
                                    <div class="customer_right">
                                       <h3 class="customer_name">Ahmad <span class="quick_icon"><img src="assets/images/quick-icon.png"></span></h3>
                                       <p class="enim_text">To foster a supportive and inclusive environment where every student feels valued, understood, and empowered. By providing holistic guidance and counseling services, we strive to help students develop a strong sense of self, cultivate positive relationships, and overcome challenges. Our vision is to inspire students to reach their full potential and become compassionate contributors to their communities.</p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
            <i class="fa fa-arrow-left"></i>
            </a>
            <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
            <i class="fa fa-arrow-right"></i>
            </a>
         </div>
      </div>
      <!-- testimonial section end -->
      <!-- news section start -->
      <div class="news_section layout_padding">
         <div class="container">
            <h1 class="news_taital">Recent News</h1>
            <div class="news_section_2">
               <div class="news_box">
                  <div id="custom_slider" class="carousel slide" data-ride="carousel">
                     <div class="carousel-inner">
                        <div class="carousel-item active">
                           <div class="news_img"><img src="assets/images/news-img.jpg"></div>
                        </div>
                        <div class="carousel-item">
                           <div class="news_img"><img src="assets/images/news-img.jpg"></div>
                        </div>
                        <div class="carousel-item">
                           <div class="news_img"><img src="assets/images/news-img.jpg"></div>
                        </div>
                     </div>
                     <a class="carousel-control-next" href="#custom_slider" role="button" data-slide="next">
                     <i class="fa fa-arrow-right"></i>
                     </a>
                  </div>
                  <h2 class="does_taital">What Does The Centre For Excellence?</h2>
                  <p class="dummy_text">"The Centre for Excellence Vocational High School program, managed by Taruna Bhakti Vocational School, has made important changes to improve the overall quality of education. This involves upgrading industry standard infrastructure and implementing non-physical activity programs that directly contribute to enhancing existing human resources" </p>
               </div>
            </div>
         </div>
      </div>
      <!-- news section end -->
     
      <!-- footer section start -->
      <div class="footer_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="location_text">
                     <ul>
                        <li>
                           <a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i></a>
                        </li>
                        <li>
                           <a href="#"><i class="fa fa-phone" aria-hidden="true"></i></a>
                        </li>
                        <li>
                           <a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a>
                        </li>
                     </ul>
                  </div>
               </div>
               <div class="footer_logo">
                  <a href="indexz.html">
                     <img src="/assets/images/logo/logo.png" width="160"> 
                     <p style="color: white; font-size: 18px; font-weight: bold">STARBHAK</p>
               </div>
               <div class="social_icon">
               <ul>
               <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
               <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
               <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
               </ul>
               </div>
            </div>
         </div>
      </div>
      <!-- footer section end -->
      <!-- copyright section start -->
      <div class="copyright_section">
         <div class="container">
            <p class="copyright_text">2023 | ZANCO</p>
         </div>
      </div>
      <!-- copyright section end -->
      <!-- Javascript files-->
      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/js/popper.min.js"></script>
      <script src="assets/js/bootstrap.bundle.min.js"></script>
      <script src="assets/js/jquery-3.0.0.min.js"></script>
      <script src="assets/js/plugin.js"></script>
      <!-- sidebar -->
      <script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="assets/js/custom.js"></script>
      <!-- javascript --> 
   </body>
</html>