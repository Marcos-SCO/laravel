@extends('base/index')

@section('content')

<div class="custom-product">
  <div class="trading-wrapper">

    <div class="cart container-fluid">
      <h3 class="my-5 text-center">Your cart list</h3>
      @foreach ($products as $product)
      <div class="item">
        <figure>
          <a href="{{route('productDetail', ['id' => $product->id])}}">
            <img src="https://picsum.photos/300/300?random={{$product->gallery}}" class="img-fluid trendImage" alt="{{$product->name}}">
          </a>
        </figure>
        <div class="product-description">
          <h3>{{$product->name}}</h3>
          <h4>Price : ${{$product->price}}</h4>
          <p>{{Illuminate\Support\Str::limit($product->description, 20)}}</p>
        </div>
        <div class="product-remove">
          <form action="{{route('removeProduct', [$product->cart_id])}}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger d-block m-auto">Remove</button>
          </form>
        </div>
      </div>
      @endforeach
    </div>
  </div>

  {{ $products->appends(request()->input())->links() }}
</div>

@endSection