@extends('layouts.main')

@section('content')
<div class="row">

  <div class="d-sm-flex align-items-center justify-content-between mb-4 col-12">
    <h1 class="h3 mb-0 text-gray-800">Create new City <span class="align-self-end"></span></h1>
  </div>

  <div class="card m-auto col-12">
    <div class="card-header align-self-end">
      <a href="{{route('dashboard.city.index')}}" class="btn btn-primary">
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
              <form method="POST" action="{{ route('dashboard.city.store') }}">
                @csrf

                <!-- Cityname -->
                <div class="mb-3 row">
                  <label for="stateId" class="col-md-4 col-form-label text-end">
                    {{ __('State') }} :
                  </label>

                  <div class="col-md-6">

                    <select class="form-select form-control @error('state_id') is-invalid @enderror" aria-label="Default select example" id="stateId" name="state_id">
                      <option value>Choose a State</option>
                      @foreach($states as $state)
                      <option {{ old("state_id") == $state->id ? "selected" : "" }} value="{{$state->id}}">
                        {{$state->name}}
                      </option>
                      @endforeach
                    </select>

                    @error('state_id')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
                <!-- Cityname -->
                <div class="mb-3 row">
                  <label for="stateName" class="col-md-4 col-form-label text-end">
                    {{ __('City name') }} :
                  </label>

                  <div class="col-md-6">
                    <input id="stateName" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="City name" autofocus>

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
                      {{ __('Store state') }}
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