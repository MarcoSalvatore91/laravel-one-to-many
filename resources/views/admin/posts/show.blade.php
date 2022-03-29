@extends('layouts.app')

@section('content')

<div class="container d-flex">
    <div class="mr-5">
        <img src="{{ $post->image }}" alt="{{ $post->title }}" width="200px" class="img-fluid">
    </div>
    <div>
        <h1>{{ $post->title }}</h1>
        <p><strong>Contenuto: </strong>{{ $post->content }}</p>
        <p><strong>Creato il: </strong>{{ $post->updated_at }}</p>
    </div>
</div>
<div class="container d-flex justify-content-end">
    <a class="btn btn-primary" href="{{ route('admin.posts.index') }}">Indietro</a>
</div>

@endsection