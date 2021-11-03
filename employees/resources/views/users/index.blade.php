@extends('layouts.main')

@section('content')
<div class="row">

  <div class="d-sm-flex align-items-center justify-content-between mb-4 col-12">
    <h1 class="h3 mb-0 text-gray-800">Users</h1>
  </div>

  <div class="card m-auto">
    @if (session()->has('messages'))
    <div class="alert {{session('messages')['alertClass'] ?? 'alert-success'}}" role="alert">
      {{ session('messages')['text'] }}
    </div>
    @endif

    <div class="card-header d-flex">
      <form class="input-group col-12 col-sm-6" method="get" action="{{route('dashboard.user.index')}}">
        <div class="form-outline">
          <input type="search" id="dashboard-search-user" class="form-control" name="search" data-js="dashboard-search-user" value="{{Request::get('search')}}" />
          <label class="form-label" for="dashboard-search-user">Search</label>
        </div>
        <div>
          <button type="submit" class="btn btn-primary">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </form>

      <div class="col-12 col-sm-6 justify-self-end text-right">
        <a href="{{route('dashboard.user.create')}}" class="btn btn-primary">{{Icons::render('userPlus')}} Create User</a>
      </div>
    </div>
    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#Id</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Manage</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
          <tr>
            <th scope="row">{{$user->id}}</th>
            <td class="text-capitalize">{{$user->username}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->email}}</td>
            <td>
              <a href="{{route('dashboard.user.edit', $user->id)}}" class="btn btn-success">
                {{Icons::render('edit')}}
                Edit
              </a>
              <form method="post" action="{{route('dashboard.user.delete', $user->id)}}" class="d-inline" data-js="dashboard-delete-user-{{$user->id}}">
                @csrf
                @method('delete')
                <button href="{{route('dashboard.user.delete', $user->id)}}" class="btn btn-danger">
                  {{Icons::render('trash')}}
                  Delete
                </button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
<div class="row justify-content-center my-5">
  {{ $users->links() }}
</div>

@endsection