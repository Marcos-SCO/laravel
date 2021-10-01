<?php

$totalCartItems = App\Http\Controllers\ProductController::cartItems();
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">eComm</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link active" aria-current="page" href="/">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Orders</a></li>

        <li class="nav-item">
          <form class="d-flex ms-lg-4" method="GET" action="{{route('searchProduct')}}">
            <input class="search-box form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search" value="{{$searchedKey ?? ''}}">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </li>
      </ul>
      <ul class="navbar-nav me-1 mb-2 mb-lg-0">
        @if($user = session('user'))
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{$user->name}} </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/logout">Logout</a></li>
          </ul>
        </li>
        @else
        <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
        @endif
        <li class="nav-item"><a class="nav-link" href="{{route('cartList')}}">Cart ({{$totalCartItems}})</a></li>
      </ul>
    </div>
  </div>
</nav>