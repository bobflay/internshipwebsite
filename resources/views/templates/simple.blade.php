<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Marc Template</title>

    <link rel="stylesheet" href="/templates_assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/templates_assets/css/unicons.css">
    <link rel="stylesheet" href="/templates_assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/templates_assets/css/owl.theme.default.min.css">

    <!-- MAIN STYLE -->
    <link rel="stylesheet" href="/templates_assets/css/tooplate-style.css">
    
  </head>
  <body>

    <!-- MENU -->
    <nav class="navbar navbar-expand-sm navbar-light">
        <div class="container">
            <a class="navbar-brand" href="/portfolio/{{$candidate->id}}"><i class='uil uil-user'></i> Marc</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a href="#about" class="nav-link"><span data-hover="About">About</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="#project" class="nav-link"><span data-hover="Projects">Projects</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="#resume" class="nav-link"><span data-hover="Resume">Resume</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="#contact" class="nav-link"><span data-hover="Contact">Contact</span></a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-lg-auto">
                    <div class="ml-lg-4">
                      <div class="color-mode d-lg-flex justify-content-center align-items-center">
                        <i class="color-mode-icon"></i>
                        Color mode
                      </div>
                    </div>
                </ul>
            </div>
        </div>
    </nav>

    <!-- ABOUT -->
    <section class="about full-screen d-lg-flex justify-content-center align-items-center" id="about">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-7 col-md-12 col-12 d-flex align-items-center">
                    <div class="about-text">
                        <small class="small-text">Welcome to <span class="mobile-block">my portfolio website!</span></small>
                        <h1 class="animated animated-text">
                            <span class="mr-2">Hey folks, I'm</span>
                                <div class="animated-info">
                                    <span class="animated-item">{{$candidate->name}}</span>
                                    <span class="animated-item">{{$candidate->profession}}</span>
                                </div>
                        </h1>

                        <p>Building a successful product is a challenge. I am highly energetic in user experience design, interfaces and web development.</p>
                        
                        <div class="custom-btn-group mt-4">
                          <a href="#" class="btn mr-lg-2 custom-btn"><i class='uil uil-file-alt'></i> Download Resume</a>
                          <a href="#contact" class="btn custom-btn custom-btn-bg custom-btn-link">Get a free quote</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 col-md-12 col-12">
                    <div class="about-image svg">
                        <img src="/templates_assets/images/undraw/undraw_software_engineer_lvl5.svg" class="img-fluid" alt="svg image">
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- PROJECTS -->
    <section class="project py-5" id="project">
        <div class="container">
                
                <div class="row">
                  <div class="col-lg-11 text-center mx-auto col-12">

                      <div class="col-lg-8 mx-auto">
                        <h2>Things I have designed for digital media agencies</h2>
                      </div>

                      <div class="owl-carousel owl-theme">
                        <div class="item">
                          <div class="project-info">
                            <img src="/templates_assets/images/project/project-image01.png" class="img-fluid" alt="project image">
                          </div>
                        </div>

                        <div class="item">
                          <div class="project-info">
                            <img src="/templates_assets/images/project/project-image02.png" class="img-fluid" alt="project image">
                          </div>
                        </div>

                        <div class="item">
                          <div class="project-info">
                            <img src="/templates_assets/images/project/project-image03.png" class="img-fluid" alt="project image">
                          </div>
                        </div>

                        <div class="item">
                          <div class="project-info">
                            <img src="/templates_assets/images/project/project-image04.png" class="img-fluid" alt="project image">
                          </div>
                        </div>

                        <div class="item">
                          <div class="project-info">
                            <img src="/templates_assets/images/project/project-image05.png" class="img-fluid" alt="project image">
                          </div>
                        </div>
                      </div>

                  </div>
                </div>
        </div>
    </section>

    <!-- FEATURES -->
    <section class="resume py-5 d-lg-flex justify-content-center align-items-center" id="resume">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-12">
                  <h2 class="mb-4">Experiences</h2>

                    <div class="timeline">
                        @foreach($candidate->experiences as $experience)
                          <div class="timeline-wrapper">
                              <div class="timeline-yr">
                                    <span>{{$experience->end_year}}</span>
                              </div>
                              <div class="timeline-info">
                                    <h3>
                                      <span>{{$experience->position}}</span><br>
                                      <span><h6>{{$experience->company_name}}</h6></span>
                                    </h3>
                                    <p>{{$experience->description}}</p>
                              </div>
                          </div>
                        @endforeach

                    </div>
                </div>

                <div class="col-lg-6 col-12">
                  <h2 class="mb-4 mobile-mt-2">Educations</h2>

                    <div class="timeline">
                        @foreach($candidate->educations as $education)
                        <div class="timeline-wrapper">
                             <div class="timeline-yr">
                                  <span>{{$education->end_year}}</span>
                             </div>
                             <div class="timeline-info">
                                  <h3><span>{{$education->institution}}</span><small>{{$education->degree}}</small></h3>
                                  <p>{{$education->description}}</p>
                             </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                
            </div>
        </div>
    </section>

    <!-- CONTACT -->
    <section class="contact py-5" id="contact">
      <div class="container">
        <div class="row">
          
          <div class="col-lg-5 mr-lg-5 col-12">
            <div class="google-map w-100">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12088.558402180099!2d-73.99373482142036!3d40.75895421922642!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855b8fb3083%3A0xa0f9aef176042a5c!2sTheater+District%2C+New+York%2C+NY%2C+USA!5e0!3m2!1sen!2smm!4v1549875377188" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>

            <div class="contact-info d-flex justify-content-between align-items-center py-4 px-lg-5">
                <div class="contact-info-item">
                  <h3 class="mb-3 text-white">Say hello</h3>
                  <p class="footer-text mb-0">+961 00 000 000</p>
                  <p><a href="mailto:hello@company.co">youremail@hotmail.com</a></p>
                </div>

                <ul class="social-links">
                     <li><a href="#" class="uil uil-dribbble" data-toggle="tooltip" data-placement="left" title="Dribbble"></a></li>
                     <li><a href="#" class="uil uil-instagram" data-toggle="tooltip" data-placement="left" title="Instagram"></a></li>
                     <li><a href="#" class="uil uil-youtube" data-toggle="tooltip" data-placement="left" title="Youtube"></a></li>
                </ul>
            </div>
          </div>

          <div class="col-lg-6 col-12">
            <div class="contact-form">
              <h2 class="mb-4">Interested to work together? Let's talk</h2>

              <form action="" method="get">
                <div class="row">
                  <div class="col-lg-6 col-12">
                    <input type="text" class="form-control" name="name" placeholder="Your Name" id="name">
                  </div>

                  <div class="col-lg-6 col-12">
                    <input type="email" class="form-control" name="email" placeholder="Email" id="email">
                  </div>

                  <div class="col-12">
                    <textarea name="message" rows="6" class="form-control" id="message" placeholder="Message"></textarea>
                  </div>

                  <div class="ml-lg-auto col-lg-5 col-12">
                    <input type="submit" class="form-control submit-btn" value="Send Button">
                  </div>
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>
    </section>

    <!-- FOOTER -->
     <footer class="footer py-5">
          <div class="container">
               <div class="row">

                    <div class="col-lg-12 col-12">                                
                        <p class="copyright-text text-center">Copyright &copy; 2023 Marc Hebbo . All rights reserved</p>
                        <p class="copyright-text text-center">Designed by <a rel="nofollow" href="">Marc Hebbo</a></p>
                    </div>
                    
               </div>
          </div>
     </footer>

    <script src="/templates_assets/js/jquery-3.3.1.min.js"></script>
    <script src="/templates_assets/js/popper.min.js"></script>
    <script src="/templates_assets/js/bootstrap.min.js"></script>
    <script src="/templates_assets/js/Headroom.js"></script>
    <script src="/templates_assets/js/jQuery.headroom.js"></script>
    <script src="/templates_assets/js/owl.carousel.min.js"></script>
    <script src="/templates_assets/js/smoothscroll.js"></script>
    <script src="/templates_assets/js/custom.js"></script>

  </body>
</html>