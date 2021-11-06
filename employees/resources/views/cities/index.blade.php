@extends('layouts.main')

@section('content')
<div class="row">

  <div class="d-sm-flex align-items-center justify-content-between mb-4 col-12">
    <h1 class="h3 mb-0 text-gray-800">Cities</h1>
  </div>

  <div class="card m-auto">
    @if (session()->has('messages'))
    <div class="alert {{session('messages')['alertClass'] ?? 'alert-success'}}" role="alert">
      {{ session('messages')['text'] }}
    </div>
    @endif

    <div class="card-header d-flex">
      <form class="input-group col-12 col-sm-6" method="get" action="{{route('dashboard.city.index')}}">
        <div class="form-outline">
          <input type="search" id="dashboard-search-city" class="form-control" name="search" data-js="dashboard-search-city" value="{{Request::get('search')}}" />
          <label class="form-label" for="dashboard-search-city">Search</label>
        </div>
        <div>
          <button type="submit" class="btn btn-primary">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </form>

      <div class="col-12 col-sm-6 justify-self-end text-right">
        <a href="{{route('dashboard.city.create')}}" class="btn btn-primary">{{Icons::render('map')}} Create City</a>
      </div>
    </div>
    @if(count($cities) > 0)
    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#Id</th>
            <th scope="col">State id</th>
            <th scope="col">Name</th>
            <th scope="col">Manage</th>
          </tr>
        </thead>
        <tbody>
          @foreach($cities as $city)
          <tr>
            <th scope="row">{{$city->id}}</th>
            <td>{{$city->state_id}}</td>
            <td class="text-capitalize">{{$city->name}}</td>
            <td>
              <a href="{{route('dashboard.city.edit', $city->id)}}" class="btn btn-success">
                {{Icons::render('edit')}}
                Edit
              </a>
              <form method="post" action="{{route('dashboard.city.delete', $city->id)}}" class="d-inline" data-js="dashboard-delete-city-{{$city->id}}">
                @csrf
                @method('delete')
                <button href="{{route('dashboard.city.delete', $city->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure?')">
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
  {{ $cities->links() }}
</div>

@endsection