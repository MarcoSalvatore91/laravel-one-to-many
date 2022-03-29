@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1>Personal Posts</h1>
        </div>
        <div>
            <a href="{{ route('admin.posts.create') }}">
                <h3 class="btn btn-primary">+ Aggiungi</h3>
            </a>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Titolo</th>
                <th scope="col">Slug</th>
                <th scope="col">Creato il:</th>
                <th scope="col">Contenuto</th>
                <th scope="col">Azioni</th>
            </tr>
        </thead>
        <tbody>
            @forelse($posts as $post)
            <tr>
                <th scope="row">{{ $post->title }}</th>
                <td>{{ $post->slug }}</td>
                <td>{{ $post->created_at }}</td>
                <td>{{ $post->content }}</td>
                <td class=" d-flex">
                    <a class="btn btn-info mr-2" href="{{ route('admin.posts.show', $post->id) }}"><i class="fa-solid fa-eye"></i></a>
                    <a class="btn btn-success mr-2" href="{{ route('admin.posts.edit', $post->id) }}"><i class="fa-solid fa-pen"></a></i>

                    <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal-{{ $post->id }}"><i class="fa-solid fa-trash-can"></i></button>

                    <div class="modal fade" id="exampleModal-{{ $post->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Eliminare</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Sei sicuro di voler eliminare {{ $post->title }}?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                                    <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Elimina</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @empty
            <p>Non Ci Sono Post</p>
            @endforelse
        </tbody>
    </table>
    @if($posts->hasPages())
    {{ $posts->links() }}
    @endif
</div>
@endsection