@extends('master')

@section('content')

<section class="page-header">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
          <div class="page-header-content">
            <h1>Login</h1>
            <ul class="list-inline mb-0">
              <li class="list-inline-item">
                <a href="#">Home</a>
              </li>
              <li class="list-inline-item">/</li>
              <li class="list-inline-item">
                  Register
              </li>
            </ul>
          </div>
      </div>
    </div>
  </div>
</section>



<main class="site-main page-wrapper woocommerce single single-product">
    <section class="space-3">
        <div class="container">
            <div class="row">

                <div class="col-md-6">
                    <h2 class="font-weight-bold mb-4">Register</h2>
                    <form method="post" class="woocommerce-form woocommerce-form-register register">
                        <div id="carousel" class="carousel slide" data-ride="carousel" data-interval="false">
                            <ol class="carousel-indicators">
                              <li data-target="#carousel" data-slide-to="0" class="active"></li>
                              <li data-target="#carousel" data-slide-to="1"></li>
                              <li data-target="#carousel" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                              <div class="carousel-item active">
                                    <form>
                                        <label for="name">Name:</label><br>
                                        <input type="text" id="name" name="name"><br>
                                        <label for="email">Email:</label><br>
                                        <input type="email" id="email" name="email"><br>
                                        <button type="button" onclick="nextStep()">Next</button>
                                    </form>
                              </div>
                              <div class="carousel-item">
                                <form>
                                    <label for="password">Password:</label><br>
                                    <input type="password" id="password" name="password"><br>
                                    <label for="confirm-password">Confirm Password:</label><br>
                                    <input type="password" id="confirm-password" name="confirm-password"><br>
                                    <button type="button" onclick="nextStep()">Next</button>
                                </form>
                              </div>
                              <div class="carousel-item">
                                <form>
                                    <label for="phone">Phone:</label><br>
                                    <input type="tel" id="phone" name="phone"><br>
                                    <label for="address">Address:</label><br>
                                    <input type="text" id="address" name="address"><br>
                                    <button type="submit">Submit</button>
                                </form>
                              </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--shop category end-->
</main>

@endsection
