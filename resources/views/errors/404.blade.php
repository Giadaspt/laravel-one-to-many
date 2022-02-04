@extends('layouts.app')

@section('content')
  <div class="container text-center">
    <h1>
      Errore 404
    </h1>
    <p>
      {{$exception->getMessage()}}
    </p>
  </div>
@endsection