@extends('master')
@section('content')
    <!--course section start-->
    <section class="section-padding course-grid" >
        <div class="container">
            <div class="row course-gallery ">
                @foreach($result as $user)
                <div class="course-item col-lg-4 col-md-6">
                    <div class="course-block">
                        <div class="course-img">
                            <img src="test.png" alt="" class="img-fluid">
                            <span class="course-label">{{$user['category']}}</span>
                        </div>

                        <div class="course-content">
                            <div class="course-price">{{$user['score']}} <span class="">/100</span></div>
                            <h4><a href="#">{{$user['name']}}</a></h4>
                            <div class="rating">
                                @if($user['score']>0)
                                <a href="#"><i class="fa fa-star"></i></a>
                                @endif
                                @if($user['score']>60)
                                <a href="#"><i class="fa fa-star"></i></a>
                                @endif
                                @if($user['score']>70)
                                <a href="#"><i class="fa fa-star"></i></a>
                                @endif
                                @if($user['score']>80)
                                <a href="#"><i class="fa fa-star"></i></a>
                                @endif
                                @if($user['score']>90)
                                <a href="#"><i class="fa fa-star"></i></a>
                                @endif
                            </div>

                            <p>Congratulations! <br> You have passed Phase 2 of the Xpertbot Training Program.</p>
                            <div class="course-footer d-lg-flex align-items-center justify-content-between">
                                <div class="course-meta">
                                    <span class="course-student"><i class="bi bi-calendar"></i>July 2, 2023</span>
                                </div>
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
@endsection
