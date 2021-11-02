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

    <div class="card-header align-self-end">
      <a href="{{route('dashboard.user.create')}}">{{Icons::render('userPlus')}} Create</a>
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

@endsection