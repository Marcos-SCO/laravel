@extends('base/index')

@section('content')

<h1>Login Page</h1>

<div class="container my-5">
  <div class="row align-item-center">
    <div class="form-container">
      <form action="">
        <div class="div form-group">
          <label for="email"></label>
          <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="div form-group">
          <label for="password"></label>
          <input type="password" name="password" id="password" class="form-control">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div>
  </div>
</div>

@endSection