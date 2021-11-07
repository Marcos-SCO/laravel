@extends('layouts.main')

@section('content')
<div class="row">

  <div class="d-sm-flex align-items-center justify-content-between mb-4 col-12">
    <h1 class="h3 mb-0 text-gray-800">{{$department->name}}</h1>
  </div>

  <div class="card col-12">
    <div class="card-header align-self-end">
      <p>Edit Department</p>
      <a href="{{route('dashboard.department.index')}}" class="btn btn-primary">
        {{Icons::render('back')}}
        Back
      </a>
    </div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12">

          <div class="card">
            <div class="card-header">{{ __('Update Department') }}</div>

            <form method="POST" action="{{ route('dashboard.department.update', $department->id) }}" class="card-body">
              @csrf
              @method('PUT')

              <!-- Department name -->
              <div class="mb-3 row">
                <label for="departmentName" class="col-md-4 col-form-label text-end">
                  {{ __('Department name') }} :
                </label>

                <div class="col-md-6">
                  <input id="departmentName" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $department->name}}" autocomplete="name" autofocus>

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