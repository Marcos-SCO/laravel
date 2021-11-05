@extends('layouts.main')

@section('content')
<div class="row">

  <div class="d-sm-flex align-items-center justify-content-between mb-4 col-12">
    <h1 class="h3 mb-0 text-gray-800">{{$state->name}}</h1>
  </div>

  <div class="card col-12">
    <div class="card-header align-self-end">
      <p>Edit State</p>
      <a href="{{route('dashboard.user.index')}}">
        {{Icons::render('back')}}
        Back
      </a>
    </div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12">

          <div class="card">
            <div class="card-header">{{ __('Update State') }}</div>

            <form method="POST" action="{{ route('dashboard.state.update', $state->id) }}" class="card-body">
              @csrf
              @method('PUT')

              <!-- State code -->
              <div class="mb-3 row">
                <label for="countryId" class="col-md-4 col-form-label text-end">
                  {{ __('Country') }} :
                </label>

                <div class="col-md-6">

                  <select class="form-select form-control @error('country_id') is-invalid @enderror" aria-label="Default select example" id="countryId" name="country_id">
                    <option value>Choose a Country</option>
                    @foreach($countries as $country)
                    <option {{ $country->id === $state->country_id ? "selected" : "" }} value="{{$country->id}}">
                      {{$country->name}}
                    </option>
                    @endforeach
                  </select>

                  @error('country_id')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>

              <!-- State name -->
              <div class="mb-3 row">
                <label for="stateName" class="col-md-4 col-form-label text-end">
                  {{ __('State name') }} :
                </label>

                <div class="col-md-6">
                  <input id="stateName" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $state->name}}" autocomplete="name" autofocus>

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