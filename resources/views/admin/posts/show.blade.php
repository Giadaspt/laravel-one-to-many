@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-8 offset-2">
        <h2 class="text-center">
          {{ $post->title}}
        </h2>
        <p>
          {{ $post->content }}
        </p>
      </div>

    </div>
    <section  class="d-flex justify-content-between">
      <button class="btn btn-primary mr-2">
        <a class="text-white" href=" {{ URL::previous() }} "> Indietro </a>
      </button>
      <div class="d-flex">
        <button type="submit" class="btn btn-warning  mr-2">
          <a class="text-white" href=" {{ route('admin.posts.edit', $post) }}">
            Modifica
          </a>
        </button>

        <form onsubmit="return confirm('Vuoi eliminare {{ $post->title }}?')"
          action="{{ route('admin.posts.destroy', $post) }}"
          method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger ">
            Elimina
          </button>
        </form>
      </div>
    </section>

  </div>
@endsection