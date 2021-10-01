@extends('base/index')

@section('content')

<div class="container my-5">
  <figure class="row product-detail">
    <div class="col-sm-6">
      <img src="https://picsum.photos/300/300?random={{$product->gallery}}" alt="{{$product->name}}" class="detail-img">
    </div>
    <figcaption class="col-sm-6">
      <a href="/">Go back</a>
      <h2>{{$product->name}}</h2>
      <h3>Price: ${{$product->price}}</h3>
      <p>
      <h4>Details:</h4> {{$product->description}}</p>
      <h5>Category: {{$product->category}}</h5>
      
      <button type="button" class="btn btn-primary mt-3">Add to cart</button>
      <button type="button" class="btn btn-success mt-3">Buy Now</button>
    </figcaption>

  </figure>
</div>

@endSection