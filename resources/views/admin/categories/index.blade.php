@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1>Categoria</h1>
        </div>
        <div>
            <a href="{{ route('admin.categories.create') }}">
                <h3 class="btn btn-primary">+ Aggiungi</h3>
            </a>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Categoria</th>
                <th scope="col">Colore</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
            <tr>
                @if($category)
                <td class="badge rounded-pill btn-{{ $category->color }} btn-pills">{{ $category->label }}</td>
                @else
                <td class="text-center">--</td>
                @endif
                <td>{{ $category->color }}</td>

                <td class="d-flex justify-content-end">
                    <a class="btn btn-info mr-2" href="{{ route('admin.categories.show', $category->id) }}"><i class="fa-solid fa-eye"></i></a>
                    <a class="btn btn-success mr-2" href="{{ route('admin.categories.edit', $category->id) }}"><i class="fa-solid fa-pen"></a></i>

                    <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal-{{ $category->id }}"><i class="fa-solid fa-trash-can"></i></button>

                    <div class="modal fade" id="exampleModal-{{ $category->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Eliminare</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Sei sicuro di voler eliminare {{ $category->label }}?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
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
            <p>Non Ci Sono Categorie</p>
            @endforelse
        </tbody>
    </table>
</div>
@endsection