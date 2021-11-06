@extends('layouts.main')

@section('content')
<div class="row">

  <div class="d-sm-flex align-items-center justify-content-between mb-4 col-12">
    <h1 class="h3 mb-0 text-gray-800">{{$user->first_name}}</h1>
  </div>

  <div class="card col-12">
    <div class="card-header align-self-end">
      <p>Edit User</p>
      <a href="{{route('dashboard.user.index')}}" class="btn btn-primary">
        {{Icons::render('back')}}
        Back
      </a>
    </div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12">

          <div class="card">
            <div class="card-header">{{ __('Update User') }}</div>

            <form method="POST" action="{{ route('dashboard.user.update', $user->id) }}" class="card-body">
              @csrf
              @method('PUT')
              <!-- Username -->
              <div class="mb-3 row">
                <label for="username" class="col-md-4 col-form-label text-end">
                  {{ __('Username') }} :
                </label>

                <div class="col-md-6">
                  <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') ?? $user->username }}" autocomplete="username" autofocus>

                  @error('username')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <!-- First name -->
              <div class="mb-3 row">
                <label for="first_name" class="col-md-4 col-form-label text-end">
                  {{ __('First name') }} :
                </label>

                <div class="col-md-6">
                  <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') ?? $user->first_name}}" autocomplete="first_name" autofocus>

                  @error('first_name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <!-- Last name -->
              <div class="mb-3 row">
                <label for="last_name" class="col-md-4 col-form-label text-end">
                  {{ __('Last name') }} :
                </label>

                <div class="col-md-6">
                  <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') ?? $user->last_name }}" autocomplete="last_name" autofocus>

                  @error('last_name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>

              <div class="mb-3 row">
                <label for="email" class="col-md-4 col-form-label text-end">
                  {{ __('E-Mail Address') }} :
                </label>

                <div class="col-md-6">
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $user->email }}" autocomplete="email" autofocus>

                  @error('email')
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

          <div class="card mt-5">
            <div class="card-header">{{ __('Change password') }}</div>

            <form method="POST" action="{{ route('dashboard.user.change.password', $user->id) }}" class="card-body">
              @csrf
              @method('PUT')

              <div class="mb-3 row">
                <label for="password" class="col-md-4 col-form-label text-end">
                  {{ __('Password') }} :
                </label>

                <div class="col-md-6">
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" value="{{old('password')}}">

                  @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>

              <div class="mb-3 row">
                <label for="confirm_password" class="col-md-4 col-form-label text-end">
                  {{ __('Confirm Password') }} :
                </label>

                <div class="col-md-6">
                  <input id="confirm_password" type="password" class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password" autocomplete="new-password" value="{{old('confirm_password')}}">

                  @error('confirm_password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>

              <div class="mb-3 row">
                <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                    {{ __('Change Password') }}
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