@extends('layouts.layout')

@section('content')

<div class="container">
    <a href="/dashboard" class="btn btn-warning">Upload</a>
</div>

<div class="container mx-auto p-8">
    <div class="fllex fex-rox-2w flex-wrap -m">
        @forelse($images as $image)
        <div class="mb-4 px-2 max-w-xs">
            <div class="card">
                <img src="{{ asset($image->image) }}" class="card-img-top" alt="broken">
                <div class="card-body">
                    @if(Auth::check())
                    @if($image->user_id == Auth::User()->id)
                    <form action="">
                        @csrf
                        <input type="submit" value="Delete" class="btn btn-danger">
                    </form>
                    @endif
                    @endif
                </div>
            </div>
        </div>
        @empty
        <h1 class="text-danger">There is no uploads</h1>
        @endforelse
    </div>
</div>

@endsection