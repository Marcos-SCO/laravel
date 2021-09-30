@extends('base/index')

@section('content')

<div class="custom-product">
  <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      @foreach ($products as $product)
      <button type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide-to="{{($product->id - 1)}}" class="{{ $product->id == 1 ? 'active' : '' }}"></button>
      @endforeach
    </ol>

    <div class="carousel-inner">
      @foreach ($products as $product)
      <figure class="carousel-item {{ $product->id == 1 ? 'active' : '' }}">
        <img src="https://picsum.photos/300/300?random={{$product->gallery}}" class="img-fluid slider-img" alt="{{$product->name}}">
        <figcaption class="carousel-caption">
          <h3>{{$product->name}}</h3>
          <p>{{$product->description}}</p>
        </figcaption>
      </figure>
      @endforeach
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <div class="trading-wrapper">
    <h3>Trending products</h3>

    <div class="trending items">
      @foreach ($trending as $trend)
      <figure class="item">
        <img src="https://picsum.photos/300/300?random={{$trend->gallery}}" class="img-fluid trendImage" alt="{{$trend->name}}">
        <figcaption><h3>{{$trend->name}}</h3></figcaption>
      </figure>
      @endforeach
    </div>
  </div>
</div>

@endSection