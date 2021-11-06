@extends('layouts.main')

@section('content')
<div class="row">

  <div class="d-sm-flex align-items-center justify-content-between mb-4 col-12">
    <h1 class="h3 mb-0 text-gray-800">{{$country->name}}</h1>
  </div>

  <div class="card col-12">
    <div class="card-header align-self-end">
      <p>Edit Country</p>
      <a href="{{route('dashboard.country.index')}}" class="btn btn-primary">
        {{Icons::render('back')}}
        Back
      </a>
    </div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12">

          <div class="card">
            <div class="card-header">{{ __('Update Country') }}</div>

            <form method="POST" action="{{ route('dashboard.country.update', $country->id) }}" class="card-body">
              @csrf
              @method('PUT')

              <!-- Country code -->
              <div class="mb-3 row">
                <label for="countryCode" class="col-md-4 col-form-label text-end">
                  {{ __('Country code') }} :
                </label>

                <div class="col-md-6">
                  <input id="countryCode" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') ?? $country->code}}" autocomplete="code" autofocus>

                  @error('code')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>

              <!-- Country name -->
              <div class="mb-3 row">
                <label for="countryName" class="col-md-4 col-form-label text-end">
                  {{ __('Country name') }} :
                </label>

                <div class="col-md-6">
                  <input id="countryName" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $country->name}}" autocomplete="name" autofocus>

                  @error('name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>

              <div class="mb-3 row">
                <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                    {{ __('Update') }}
                  </button>
                </div>
              </div>
            </form>

          </div>

        </div>
      </div>
    </div>
  </div>

</div>

@endsection