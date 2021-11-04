@extends('layouts.main')

@section('content')
<div class="row">

  <div class="d-sm-flex align-items-center justify-content-between mb-4 col-12">
    <h1 class="h3 mb-0 text-gray-800">Countries</h1>
  </div>

  <div class="card m-auto">
    @if (session()->has('messages'))
    <div class="alert {{session('messages')['alertClass'] ?? 'alert-success'}}" role="alert">
      {{ session('messages')['text'] }}
    </div>
    @endif

    <div class="card-header d-flex">
      <form class="input-group col-12 col-sm-6" method="get" action="{{route('dashboard.country.index')}}">
        <div class="form-outline">
          <input type="search" id="dashboard-search-country" class="form-control" name="search" data-js="dashboard-search-country" value="{{Request::get('search')}}" />
          <label class="form-label" for="dashboard-search-country">Search</label>
        </div>
        <div>
          <button type="submit" class="btn btn-primary">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </form>

      <div class="col-12 col-sm-6 justify-self-end text-right">
        <a href="{{route('dashboard.country.create')}}" class="btn btn-primary">{{Icons::render('map')}} Create Country</a>
      </div>
    </div>
    @if(count($countries) > 0)
    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#Id</th>
            <th scope="col">Code</th>
            <th scope="col">Name</th>
            <th scope="col">Manage</th>
          </tr>
        </thead>
        <tbody>
          @foreach($countries as $country)
          <tr>
            <th scope="row">{{$country->id}}</th>
            <td>{{$country->code}}</td>
            <td class="text-capitalize">{{$country->name}}</td>
            <td>
              <a href="{{route('dashboard.country.edit', $country->id)}}" class="btn btn-success">
                {{Icons::render('edit')}}
                Edit
              </a>
              <form method="post" action="{{route('dashboard.country.delete', $country->id)}}" class="d-inline" data-js="dashboard-delete-country-{{$country->id}}">
                @csrf
                @method('delete')
                <button href="{{route('dashboard.country.delete', $country->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure?')">
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
  {{ $countries->links() }}
</div>

@endsection