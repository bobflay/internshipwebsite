@extends('master')
@section('content')
<main class="site-main page-wrapper woocommerce single single-product text-center">

<div class="container text-center">
    <div class="row justify-content-center">

        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{$candidate->image}}" alt="Card image cap">
            <div class="card-body">
            <h5 class="card-title">{{$candidate->name}}</h5>
            @if(isset($candidate->category->name))
            <p class="card-text">{{$candidate->category->name}}</p>
            @endif
            @if($candidate->registered)
            <a href="#" class="btn btn-success">Registered</a>
            @else
            <a href="#" class="btn btn-danger">Not Registered</a>
            <h6 class="form-text text-muted">You can pay the fees through the Whish Money
                app to the following account:  </h6>
                <h3>9613477079</h3>
            <small class="form-text text-muted">
                The amount due in USD is only $25<br>
            </small>
            @endif
            </div>
        </div>
    </div>
</div>
</main>


@endsection
