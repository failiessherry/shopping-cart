@extends('layouts.master')
@section('title')
    Laravel ShoppingCart
@endsection
@section('content')
    <div class="row">
        @foreach( $Products  as $product)
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img src="{{$product->imagePath}}" alt="...">
                <div class="caption">
                    <h3>{{$product->title}}</h3>
                    <p class="description">{{$product->description}}</p>
                    <div class="clearfix">
                      <div class="pull-left price">$ {{$product->price}}</div>
                      <a href="#" class="btn btn-success pull-right" role="button">Add to Cart</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>
@endsection