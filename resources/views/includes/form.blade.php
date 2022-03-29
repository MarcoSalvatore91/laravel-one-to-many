@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if($post->exists)
<form class="container" action="{{ route('admin.posts.update', $post->id) }}" method="POST">
    @method('PUT')
    @else
    <form class="container" action="{{ route('admin.posts.store') }}" method="POST">
        @endif
        @csrf
        <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" class="form-control" @error('title') is-invalid @enderror id="title" name="title" required minlength="5" maxlength="50" value="{{ old('title', $post->title) }}">
            <small class="form-text text-muted">Inserisci un titolo</small>
        </div>
        <div class="form-group">
            <label for="image">Immagine</label>
            <input type="text" class="form-control" id="image" name="image" value="{{ old('image', $post->image) }}">
            <small class="form-text text-muted">Inserisci un'immagine</small>
        </div>
        <div class="form-group">
            <label for="content">Descrizione</label>
            <textarea class="form-control" id="content" @error('content') is-invalid @enderror name="content" rows="5" required minlength="5">{{ old('content', $post->content) }}</textarea>
            <small class="form-text text-muted">Aggiungi una descrizione</small>
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Invia</button>
        </div>
    </form>