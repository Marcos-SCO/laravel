@extends('layouts.main')

@section('content')
<div class="row">

  <div class="d-sm-flex align-items-center justify-content-between mb-4 col-12">
    <h1 class="h3 mb-0 text-gray-800">{{$city->name}}</h1>
  </div>

  <div class="card col-12">
    <div class="card-header align-self-end">
      <p>Edit City</p>
      <a href="{{route('dashboard.city.index')}}" class="btn btn-primary">
        {{Icons::render('back')}}
        Back
      </a>
    </div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12">

          <div class="card">
            <div class="card-header">{{ __('Update City') }}</div>

            <form method="POST" action="{{ route('dashboard.city.update', $city->id) }}" class="card-body">
              @csrf
              @method('PUT')

              <!-- City code -->
              <div class="mb-3 row">
                <label for="cityId" class="col-md-4 col-form-label text-end">
                  {{ __('State') }} :
                </label>

                <div class="col-md-6">

                  <select class="form-select form-control @error('city_id') is-invalid @enderror" aria-label="Default select example" id="cityId" name="city_id">
                    <option value>Choose a State</option>
                    @foreach($states as $state)
                    <option {{ $state->id === $city->state_id ? "selected" : "" }} value="{{$state->id}}">
                      {{$state->name}}
                    </option>
                    @endforeach
                  </select>

                  @error('city_id')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>

              <!-- City name -->
              <div class="mb-3 row">
                <label for="cityName" class="col-md-4 col-form-label text-end">
                  {{ __('City name') }} :
                </label>

                <div class="col-md-6">
                  <input id="cityName" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $city->name}}" autocomplete="name" autofocus>

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