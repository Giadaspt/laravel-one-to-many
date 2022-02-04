@extends('layouts.app')

@section('content')
  <div class="container">
    <h2>
      Modifica il post: {{$post->title}}
    </h2>

    @if ($errors->any())
    <div class="alert alert-danger" role="alert">
      <ul>
        @foreach ($errors->all() as $error)
          <li> {{$error}} </li>
        @endforeach
      </ul>
    </div>
    @endif
    
    <form action="{{ route("admin.posts.update", $post) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="mb-3">
        <label for="title" class="form-label">Titolo del post</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" 
        value="{{ old('title', $post->title) }}"
        name="title"
        id="title" placeholder="Inserisci il titolo del post">
        @error('title')
        <p class="text-danger">
          {{$message}}
        </p>
        @enderror
      </div>
      <div class="mb-3">
        <label for="content" class="form-label">Scrivi qui quello che vuoi</label>
        <textarea class="form-control @error('content') is-invalid @enderror "
        name="content"
        id="exampleFormControlTextarea1" rows="3">{{ old('content', $post->content) }}</textarea>
        @error('content')
          <p class="text-danger">
            {{$message}}
          </p>
        @enderror
      </div>
      <section  class="d-flex justify-content-between">
        <button class="btn btn-primary mr-2">
          <a class="text-white" href=" {{ URL::previous() }} "> Indietro </a>
        </button>
        <div>
          <button type="submit" class="btn btn-primary  mr-2">
            Invia
          </button>
          <button type="reset" class="btn btn-secondary ">
            Cancella
          </button>
        </div>
      </section>
    </form>
  </div>
@endsection

@section('title')
  Crea il post
@endsection