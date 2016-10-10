@extends('layouts.master')
@section('title')
    Laravel ShoppingCart
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img src="https://pbs.twimg.com/media/CokbYlAUkAAlzRh.jpg:large" alt="...">
                <div class="caption">
                    <h3>Product Title</h3>
                    <p class="description">Lorem ipsum dolor sit amet, mauris elit libero, lacus volutpat, eu consectetuer justo eu pellentesque. Impedit vestibulum donec, vivamus mi, ut pellentesque porta justo enim eu, in porttitor massa enim inceptos non sed. Ultricies velit. In ut, rhoncus mi facilisis, tellus diam consectetuer mi vestibulum ipsum platea, nec quis elit et id sem vero.</p>
                    <div class="clearfix">
                      <div class="pull-left price">$ 100</div>
                      <a href="#" class="btn btn-success pull-right" role="button">Add to Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection