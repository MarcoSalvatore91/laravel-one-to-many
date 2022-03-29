@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if($category->exists)
<form class="container" action="{{ route('admin.categories.update', $category->id) }}" method="POST">
    @method('PUT')
    @else
    <form class="container" action="{{ route('admin.categories.store') }}" method="POST">
        @endif
        @csrf
        <div class="row">
            <div class="form-group col-6">
                <label for="label">Categoria</label>
                <input type="text" class="form-control" @error('label') is-invalid @enderror id="label" name="label" required maxlength="50" value="{{ old('label', $category->label) }}">
                <small class="form-text text-muted">Inserisci una categoria</small>
            </div>

            <div class="form-group col-6">
                <label for="color">Colore Categoria</label>
                <select class="form-control" @error('color') is-invalid @enderror name="color" id="color">
                    <option value="danger" @if(old('color', $category->color) === 'danger') @endif>Rosso</option>
                    <option value="secondary" @if(old('color', $category->color) === 'secondary') @endif>Grigio</option>
                    <option value="success" @if(old('color', $category->color) === 'success') @endif>Verde</option>
                    <option value="primary" @if(old('color', $category->color) === 'primary') @endif>Blu</option>
                    <option value="warning" @if(old('color', $category->color) === 'warning') @endif>Giallo</option>
                    <option value="Info" @if(old('color', $category->color) === 'Info') @endif>Acqua</option>
                    <option value="light" @if(old('color', $category->color) === 'light') @endif>Bianco</option>
                </select>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Invia</button>
            </div>
    </form>