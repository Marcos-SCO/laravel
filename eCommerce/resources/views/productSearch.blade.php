@extends('base/index')

@section('content')

<div class="custom-product">
  <div class="trading-wrapper">
    <h3 class="text-center my-5">You search for "{{$searchedKey}}" keyword</h3>

    <div class="trending items">
      @foreach ($products as $product)
      <figure class="item">
        <a href="{{route('productDetail', ['id' => $product->id])}}">
          <img src="https://picsum.photos/300/300?random={{$product->gallery}}" class="img-fluid trendImage" alt="{{$product->name}}">
          <figcaption>
            <h3>{{$product->name}}</h3>
          </figcaption>
        </a>
      </figure>
      @endforeach
    </div>
  </div>

  {{ $products->appends(request()->input())->links() }}
</div>

@endSection