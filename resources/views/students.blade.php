<!DOCTYPE html>
<html lang="zxx">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="edutim,coaching, distant learning, education html, health coaching, kids education, language school, learning online html, live training, online courses, online training, remote training, school html theme, training, university html, virtual training  ">

  <meta name="author" content="themeturn.com">

  <title>Xpertbot Academy | students</title>

  <!-- Mobile Specific Meta-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="/assets/vendors/bootstrap/bootstrap.css">
  <!-- Iconfont Css -->
  <link rel="stylesheet" href="/assets/vendors/fontawesome/css/all.css">
  <link rel="stylesheet" href="/assets/vendors/bicon/css/bicon.min.css">
  <!-- animate.css -->
  <link rel="stylesheet" href="/assets/vendors/animate-css/animate.css">
  <!-- WooCOmmerce CSS -->
  <link rel="stylesheet" href="/assets/vendors/woocommerce/woocommerce-layouts.css">
  <link rel="stylesheet" href="/assets/vendors/woocommerce/woocommerce-small-screen.css">
  <link rel="stylesheet" href="/assets/vendors/woocommerce/woocommerce.css">
   <!-- Owl Carousel  CSS -->
  <link rel="stylesheet" href="/assets/vendors/owl/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="/assets/vendors/owl/assets/owl.theme.default.min.css">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="/assets/css/style.css">
  <link rel="stylesheet" href="/assets/css/responsive.css">

</head>

<body id="top-header">



<header>
    <!-- Main Menu Start -->
    <div class="site-navigation main_menu menu-2" id="mainmenu-area">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">
                    <img src="/assets/images/website-logo.png" alt="xpertbot-academy" class="img-fluid">
                </a>
            </div>
        </nav>
    </div>
</header>



 <!--search overlay start-->
 <div class="search-wrap">
    <div class="overlay">
        <form action="" class="search-form">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-9">
                        <h3>Search Your keyword</h3>
                        <input type="text" class="form-control" placeholder="Search..."/>
                    </div>
                    <div class="col-md-2 col-3 text-right">
                        <div class="search_toggle toggle-wrap d-inline-block">
                            <img class="search-close" src="/assets/images/close.png" srcset="assets/images/close@2x.png 2x" alt=""/>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!--search overlay end-->


<section class="page-header">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
          <div class="page-header-content">
            <h1>2022 Graduate Students</h1>
            <ul class="list-inline mb-0">
              <li class="list-inline-item">
                <a href="/">Home</a>
              </li>
              <li class="list-inline-item">/</li>
              <li class="list-inline-item">
                  Students
              </li>
            </ul>
          </div>
      </div>
    </div>
  </div>
</section>

<section class="section-padding course">
    <!-- <div class="course-top-wrap">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-4">
                    <div class="topbar-search">
                        <form method="get" action="#">
                            <input type="text"  placeholder="Search our courses" class="form-control">
                            <label><i class="fa fa-search"></i></label>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> -->


    <div class="container">
        <div class="row">
            @foreach($students as $student)
            <div class="col-lg-4 col-md-6">
                <div class="course-block course-style-2">
                    <div class="course-img">
                        <img src="{{$student->profile_photo}}" alt="" class="img-fluid">
                    </div>

                    <div class="course-content">

                        <h4><a href="#">{{$student->name}}</a></h4>

                        <p>{{$student->project}}</p>
                        <div class="course-footer d-lg-flex align-items-center justify-content-between">
                            <div class="course-meta">
                                <a href="{{$student->linkedin}}" target="_blank">
                                    <span class="course-student" style="font-size:30px"><i class="bi bi-linkedin"></i></span>
                                </a>

                                <a href="/students/{{$student->uuid}}" target="_blank">
                                    <span class="course-student" style="font-size:30px"><i class="bi bi-badge1"></i></span>
                                </a>
                            </div>

                            <div class="buy-btn"><a href="{{$student->url}}" target="_blank" class="btn btn-main-2 btn-small">Details</a></div>
                        </div>
                    </div>

                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>




<section class="cta-2">
    <div class="container">
        <div class="row align-items-center subscribe-section ">
            <div class="col-lg-6">
                <div class="section-heading white-text">
                    <span class="subheading">Newsletter</span>
                    <h3>Join our community of students</h3>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="subscribe-form">
                    <form action="#">
                        <input type="text" class="form-control" placeholder="Email Address">
                        <a href="#" class="btn btn-main">Subscribe<i class="fa fa-angle-right ml-2"></i> </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="footer pt-120">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 mr-auto col-sm-6 col-md-6">
				<div class="widget footer-widget mb-5 mb-lg-0">
					<h5 class="widget-title">About Us</h5>
					<p class="mt-3">Veniam Sequi molestias aut necessitatibus optio magni at natus accusamus.Lorem ipsum dolor sit amet, consectetur adipisicin gelit, sed do eiusmod tempor incididunt .</p>
					<ul class="list-inline footer-socials">
						<li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
						<li class="list-inline-item"> <a href="#"><i class="fab fa-twitter"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fab fa-linkedin"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
					</ul>
				</div>
			</div>

			<div class="col-lg-2 col-sm-6 col-md-6">
				<div class="footer-widget mb-5 mb-lg-0">
					<h5 class="widget-title">Company</h5>
					<ul class="list-unstyled footer-links">
						<li><a href="#">About us</a></li>
						<li><a href="#">Contact us</a></li>
						<li><a href="#">Projects</a></li>
						<li><a href="#">Terms & Condition</a></li>
						<li><a href="#">Privacy policy</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-2 col-sm-6 col-md-6">
				<div class="footer-widget mb-5 mb-lg-0">
					<h5 class="widget-title">Courses</h5>
					<ul class="list-unstyled footer-links">
						<li><a href="#">SEO Business</a></li>
						<li><a href="#">Digital Marketing</a></li>
						<li><a href="#">Graphic Design</a></li>
						<li><a href="#">Site Development</a></li>
						<li><a href="#">Social Marketing</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6 col-md-6">
				<div class="footer-widget footer-contact mb-5 mb-lg-0">
					<h5 class="widget-title">Contact </h5>

					<ul class="list-unstyled">
						<li><i class="bi bi-headphone"></i>
							<div>
								<strong>Phone number</strong>
								(68) 345 5902
							</div>

						</li>
						<li> <i class="bi bi-envelop"></i>
							<div>
								<strong>Email Address</strong>
								info@yourdomain.com
							</div>
						</li>
						<li><i class="bi bi-location-pointer"></i>
							<div>
								<strong>Office Address</strong>
								Moon Street Light Avenue
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div class="footer-btm">
		<div class="container">
			<div class="row justify-content-center align-items-center">
				<div class="col-lg-6">
					<div class="footer-logo">
						<img src="/assets/images/logo-white.png" alt="Edutim" class="img-fluid">
					</div>
				</div>
				<div class="col-lg-6">
					<div class="copyright text-lg-center">
						<p>@ Copyright reserved to Edutim.Proudly Crafted by <a href="https://themeturn.com">Dreambuzz</a> </p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<div class="fixed-btm-top">
	<a href="#top-header" class="js-scroll-trigger scroll-to-top"><i class="fa fa-angle-up"></i></a>
</div>



    <!--
    Essential Scripts
    =====================================-->

    <!-- Main jQuery -->
    <script src="/assets/vendors/jquery/jquery.js"></script>
    <!-- Bootstrap 4.5 -->
    <script src="/assets/vendors/bootstrap/bootstrap.js"></script>
    <!-- Counterup -->
    <script src="/assets/vendors/counterup/waypoint.js"></script>
    <script src="/assets/vendors/counterup/jquery.counterup.min.js"></script>
    <script src="/assets/vendors/jquery.isotope.js"></script>
    <script src="/assets/vendors/imagesloaded.js"></script>
    <!--  Owlk Carousel-->
    <script src="/assets/vendors/owl/owl.carousel.min.js"></script>
    <script src="/assets/js/script.js"></script>


  </body>
  </html>
