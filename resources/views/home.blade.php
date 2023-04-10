@extends('master')
@section('content')
<section class="banner banner-2">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-8">
                <div class="banner-content center-heading">
                    <span class="subheading">Expert instruction</span>
                    <h1>Build Skills With Experts Any Time, Anywhere </h1>
                    <p>We invest in personnel, technological innovations and infrastructure and have established regional and international offices.</p>
                    <a href="#" class="btn btn-main"><i class="fa fa-list-ul mr-2"></i>Our Program </a>
                </div>
            </div>
        </div> <!-- / .row -->
    </div> <!-- / .container -->
</section>


<section class="category-section2">
    <div class="container">
        <div class="row no-gutters">
            <div class="course-categories">
                <div class="category-item category-bg-1">
                  <a href="#">
                    <div class="category-icon">
                        <i class="bi bi-laptop"></i>
                    </div>
                    <h4>Web Development</h4>
                  </a>
                </div>
                <div class="category-item category-bg-2">
                    <a href="#">
                        <div class="category-icon">
                            <i class="bi bi-mobile"></i>
                        </div>
                        <h4>Mobile Development</h4>
                    </a>
                </div>
                <div class="category-item category-bg-3">
                   <a href="#">
                    <div class="category-icon">
                        <i class="bi bi-target-arrow"></i>
                    </div>
                    <h4>Quality Assurance</h4>
                   </a>
                </div>

                <div class="category-item category-bg-4">
                   <a href="#">
                    <div class="category-icon">
                        <i class="bi bi-rocket2"></i>
                    </div>
                    <h4>Project Management</h4>
                   </a>
                </div>
                <div class="category-item category-bg-5">
                   <a href="#">
                    <div class="category-icon">
                        <i class="bi bi-brush"></i>
                    </div>
                    <h4>Design</h4>
                   </a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-padding popular-course pb-0">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="section-heading">
                    <h3>2022 Graduate Students</h3>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="course-btn text-lg-right"><a href="/students" class="btn btn-main"><i class="fa fa-store mr-2"></i>All Students</a></div>
            </div>
        </div>

        <div class="row">
            @foreach($students as $student)
            <div class="col-lg-4 col-md-6">
                <div class="course-block">
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
<section class="about-section section-padding about-2">
    <div class="container">
        <div class="row align-items-center">
             <div class="col-lg-6 col-md-12">
               <div class="about-img2">
                   <img src="/assets/images/writing_code.jpg" alt="" class="img-fluid">
               </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="section-heading">
                    <span class="subheading">Tech Training</span>
                    <h3>Unlock Your Potential in the Tech Industry with a Training Program Featuring Multiple Tracks</h3>
                </div>

                <p>If you're a student looking to gain valuable skills in the tech industry, then joining a training program with multiple tracks in web development, quality assurance, project management, and graphic design is a great opportunity. Not only will you have the chance to learn from experienced professionals in each of these fields, but you'll also be able to explore which area of tech is the right fit for you. Plus, having a diverse set of skills will make you a valuable asset to any company in the tech industry. So don't hesitate, join a training program today and start building your future in tech!</p>

                <a href="#" class="btn btn-main"><i class="fa fa-check mr-2"></i>Learn More</a>

            </div>
        </div>
    </div>
</section>
<section class="feature-2">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-lg-3 col-md-6">
                <div class="feature-item feature-style-2">
                    <div class="feature-icon">
                        <i class="bi bi-badge2"></i>
                    </div>
                    <div class="feature-text">
                        <h4>Professional Certification</h4>
                        <p>Certification of participation from Xpertbot OÜ.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="feature-item feature-style-2">
                    <div class="feature-icon">
                        <i class="bi bi-article"></i>
                    </div>
                    <div class="feature-text">
                        <h4>Personal Project</h4>
                        <p>A project that will allows individuals to showcase their skills.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="feature-item feature-style-2">
                    <div class="feature-icon">
                        <i class="bi bi-group"></i>
                    </div>
                    <div class="feature-text">
                        <h4>One to One Mentorship</h4>
                        <p>A personalized guidance and support.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="feature-item feature-style-2">
                    <div class="feature-icon">
                        <i class="bi bi-globe3"></i>
                    </div>
                    <div class="feature-text">
                        <h4>Complete Ecosystem</h4>
                        <p>Be part of a global network of professionals</p>
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>

    <!--course section start-->
    <section class="section-padding course-grid" >
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-7">
                    <div class="section-heading center-heading">
                        <span class="subheading">Top Courses</span>
                        <h3>In-demand courses offered by professionals</h3>
                    </div>
                </div>
            </div>

            <div class="text-center">
                <ul class="course-filter">
                    <li class="active"><a href="#" data-filter="*"> All</a></li>
                    @foreach($categories as $category)
                        <li><a href="#" data-filter=".{{$category->id}}">{{$category->name}}</a></li>
                    @endforeach

                </ul>
            </div>

            <div class="row course-gallery ">
                @foreach($courses as $course)
                <div class="course-item {{$course->category->id}} col-lg-4 col-md-6">
                    <div class="course-block">
                        <div class="course-img">
                            <img src="{{$course->picture}}" alt="" class="img-fluid">
                            <span class="course-label">{{$course->difficulties}}</span>
                        </div>

                        <div class="course-content">
                            <h4><a href="#">{{$course->name}}</a></h4>
                            <div class="rating">
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <span>(5.00)</span>
                            </div>
                            <p>{{$course->body}}</p>

                            <div class="course-footer d-lg-flex align-items-center justify-content-between">
                                <div class="course-meta">
                                    <span class="course-student"><i class="bi bi-group"></i>340</span>
                                    <span class="course-duration"><i class="bi bi-badge3"></i>{{$course->lessons}}</span>
                                </div>

                                <div class="buy-btn"><a href="{{$course->link}}" target="_blank" class="btn btn-main-2 btn-small">Details</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!--course-->
    </section>
    <!--course section end-->
<section class="counter-wrap section-padding counter-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="counter-item">
                    <i class="bi bi-money"></i>
                    <div class="count">
                        <span class="counter h2">25</span><span class="h2" style="color:white">$<span>
                    </div>
                    <p>For the 5 months</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="counter-item">
                    <i class="ti-heart"></i>
                    <div class="count">
                        <span class="counter h2">{{count($all_students)}}</span><span class="h2" style="color:white">+<span>
                    </div>
                    <p>Happy Students</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="counter-item">
                    <i class="bi bi-money-bag"></i>
                    <div class="count">
                        <span class="counter h2">6</span>
                    </div>
                    <p>Scholarships</p>
                </div>
            </div>



            <div class="col-lg-3 col-md-6">
                <div class="counter-item">
                    <i class="ti-agenda"></i>
                    <div class="count">
                        <span class="counter h2">5</span>
                    </div>
                    <p>Tracks</p>
                </div>
            </div>
        </div>
    </div>
</section>

    <!--course section start-->
    <section class="section-padding video-section2 clearfix" >
        <div class="video-block-container"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <span class="subheading">Working Process</span>
                        <h3>Watch video to know more about us</h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <a href="#" class="video-icon"><i class="fa fa-play"></i></a>
                </div>
            </div>
        </div>
        <!--course-->
    </section>
    <!--course section end-->
    <!-- <section class="team section-padding bg-grey">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <span class="subheading">Best Expert Trainer</span>
                        <h3>Our Professional trainer</h3>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="course-btn text-lg-right"><a href="https://forms.gle/Qms7eHHQVSdKCKji9" target="_blank" class="btn btn-main"><i class="fa fa-user mr-2"></i>Join Us</a></div>
                </div>
            </div>


            <div class="row">
                @foreach($teachers as $teacher)
                <div class="col-lg-3 col-md-6">
                    <div class="team-item">
                        <img src="{{$teacher->photo}}" alt="" class="img-fluid">
                        <div class="team-info">
                            <h4>{{$teacher->name}}</h4>
                            <p>{{$teacher->title}}</p>

                            <ul class="team-socials list-inline">
                                <li class="list-inline-item"><a href="{{$teacher->linkedin}}" target="_blank" ><i class="fab fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section> -->
@endsection
