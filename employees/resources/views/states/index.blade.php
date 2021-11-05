@extends('layouts.main')

@section('content')
<div class="row">

  <div class="d-sm-flex align-items-center justify-content-between mb-4 col-12">
    <h1 class="h3 mb-0 text-gray-800">States</h1>
  </div>

  <div class="card m-auto">
    @if (session()->has('messages'))
    <div class="alert {{session('messages')['alertClass'] ?? 'alert-success'}}" role="alert">
      {{ session('messages')['text'] }}
    </div>
    @endif

    <div class="card-header d-flex">
      <form class="input-group col-12 col-sm-6" method="get" action="{{route('dashboard.state.index')}}">
        <div class="form-outline">
          <input type="search" id="dashboard-search-state" class="form-control" name="search" data-js="dashboard-search-state" value="{{Request::get('search')}}" />
          <label class="form-label" for="dashboard-search-state">Search</label>
        </div>
        <div>
          <button type="submit" class="btn btn-primary">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </form>

      <div class="col-12 col-sm-6 justify-self-end text-right">
        <a href="{{route('dashboard.state.create')}}" class="btn btn-primary">{{Icons::render('map')}} Create State</a>
      </div>
    </div>
    @if(count($states) > 0)
    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#Id</th>
            <th scope="col">Country code</th>
            <th scope="col">Name</th>
            <th scope="col">Manage</th>
          </tr>
        </thead>
        <tbody>
          @foreach($states as $state)
          <tr>
            <th scope="row">{{$state->id}}</th>
            <td>{{$state->country_id}}</td>
            <td class="text-capitalize">{{$state->name}}</td>
            <td>
              <a href="{{route('dashboard.state.edit', $state->id)}}" class="btn btn-success">
                {{Icons::render('edit')}}
                Edit
              </a>
              <form method="post" action="{{route('dashboard.state.delete', $state->id)}}" class="d-inline" data-js="dashboard-delete-state-{{$state->id}}">
                @csrf
                @method('delete')
                <button href="{{route('dashboard.state.delete', $state->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure?')">
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
    @endif
  </div>
</div>
<div class="row justify-content-center my-5">
  {{ $states->links() }}
</div>

@endsection