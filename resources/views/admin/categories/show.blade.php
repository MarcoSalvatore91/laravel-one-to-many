@extends('layouts.app')

@section('content')

<div class="container d-flex">
    <div>
        <h1>{{ $category->label }}</h1>
        <p><strong>Contenuto: </strong>{{ $category->color }}</p>
        <p><strong>Creato il: </strong>{{ $category->updated_at }}</p>
    </div>
</div>
<div class="container d-flex justify-content-end">
    <a class="btn btn-primary" href="{{ route('admin.categories.index') }}">Indietro</a>
</div>

@endsection