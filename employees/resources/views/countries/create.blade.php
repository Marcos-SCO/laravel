@extends('layouts.main')

@section('content')
<div class="row">

  <div class="d-sm-flex align-items-center justify-content-between mb-4 col-12">
    <h1 class="h3 mb-0 text-gray-800">Create new Country <span class="align-self-end"></span></h1>
  </div>

  <div class="card m-auto col-12">
    <div class="card-header align-self-end">
      <a href="{{route('dashboard.country.index')}}" class="btn btn-primary">
        {{Icons::render('back')}}
        Back
      </a>

    </div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header row"><span>{{ __('Register') }}<span> </div>

            <div class="card-body">
              <form method="POST" action="{{ route('dashboard.country.store') }}">
                @csrf
                <!-- Countryname -->
                <div class="mb-3 row">
                  <label for="countryCode" class="col-md-4 col-form-label text-end">
                    {{ __('Country code') }} :
                  </label>

                  <div class="col-md-6">
                    <input id="countryCode" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" autocomplete="Country code" autofocus>

                    @error('code')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
                <!-- Countryname -->
                <div class="mb-3 row">
                  <label for="countryName" class="col-md-4 col-form-label text-end">
                    {{ __('Country name') }} :
                  </label>

                  <div class="col-md-6">
                    <input id="countryName" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="Country name" autofocus>

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
                      {{ __('Store country') }}
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

</div>

@endsection