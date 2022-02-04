@extends('layouts.app')

@section('content')
  <div class="container">
    <h2>Tutti i post</h2>

    @if (session('deleted'))
    <div class="alert alert-danger" role="alert">
      Il post è stato cancellato
    </div>
    @endif
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Title</th>
          <th scope="col">Content</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($posts as $post) 
          <tr>
            <th scope="row">{{ $post->id }}</th>
            <td>{{ $post->title }}</td>
            <td>{{ $post->content }}</td>
            <td>
              <button class="btn btn-info">
                <a class="text-white" href="{{ route('admin.posts.show', $post) }}"> Show </a>
              </button>
            </td>
            <td>
              <button class="btn btn-warning">
                <a class="text-white" href="{{ route('admin.posts.edit', $post) }}"> Modifica </a>
              </button>
            </td>
            <td>
              <form onsubmit="return confirm( 'Vuoi eliminare questo elemento : {{ $post->title }} ?' )" 
                action="{{ route('admin.posts.destroy', $post) }} " 
                method="POST">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger ">
                  Elimina 
                </button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <section class="d-flex justify-content-between">
      <button class="btn btn-primary mt-2">
        <a class="text-white" href=" {{ URL::previous() }} "> Indietro </a>
      </button>
      <div >
        {{ $posts->links() }}
      </div>
    </div>
    </section>
@endsection

@section('title')
  Elenco post
@endsection