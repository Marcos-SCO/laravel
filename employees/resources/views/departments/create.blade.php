@extends('layouts.main')

@section('content')
<div class="row">

  <div class="d-sm-flex align-items-center justify-content-between mb-4 col-12">
    <h1 class="h3 mb-0 text-gray-800">Create new Department <span class="align-self-end"></span></h1>
  </div>

  <div class="card m-auto col-12">
    <div class="card-header align-self-end">
      <a href="{{route('dashboard.department.index')}}" class="btn btn-primary">
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
              <form method="POST" action="{{ route('dashboard.department.store') }}">
                @csrf
                
                <!-- Departmentname -->
                <div class="mb-3 row">
                  <label for="departmentName" class="col-md-4 col-form-label text-end">
                    {{ __('Department name') }} :
                  </label>

                  <div class="col-md-6">
                    <input id="departmentName" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="Department name" autofocus>

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
                      {{ __('Store department') }}
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