@extends('base/index')

@section('content')


<div class="container my-5 custom-login">
  <h1>Login Page</h1>
  <div class="row align-item-center">
    <div class="form-container">
      <form action="{{ route('login') }}" method="POST">
        @csrf

        @if ($errors->any())
        <ul class="mt-5 px-5 alert alert-danger">
          @foreach ($errors->all() as $error)
          <li class="my-3">{{ $error }}</li>
          @endforeach
        </ul>
        @endif

        <div class="div form-group">
          <label for="email"></label>
          <input type="email" name="email" id="email" class="form-control" value="{{old('email')}}">
        </div>
        <div class="div form-group">
          <label for="password"></label>
          <input type="password" name="password" id="password" class="form-control">
        </div>
        <button type="submit" class="btn btn-light mt-4">Submit</button>
      </form>
    </div>
  </div>
</div>

@endSection