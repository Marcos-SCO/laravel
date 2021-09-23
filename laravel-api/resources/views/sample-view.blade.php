@extends('base/base')

@section('content')
<main>
  <section>
    <h1>Reliable user, revisiting Laravel's commands.</h1>
    <p>Name: {{ $name }} | E-mail: {{ $email }}</p> 
  </section>
</main>
@endsection('content')