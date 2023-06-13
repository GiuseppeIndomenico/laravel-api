@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Aggiungi il tuo nuovo progetto </h1>
        <form action="{{ route('admin.projects.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" id="title">
            </div>
            <div class="mb-3">
                <label for="title">Description</label>
                <input type="text" class="form-control" name="description" id="description">
            </div>

            <div class="form-group">
                <label for="type_id">Tipo di progetto</label>
                <select name="type_id" id="type_id" class="form-control">
                    <option value="">Seleziona il tipo di progetto</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <p>selezione le tecnologie utilizzate:</p>
                @foreach ($technologies as $technology)
                    <div>
                        <input type="checkbox" name="technologies[]" value="{{ $technology->id }}" class="form-check-input"
                            {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}>
                        <label class="form-check-label" for="">{{ $technology->name }}</label>
                    </div>
                @endforeach
            </div>



            <button type="submit" class="btn btn-outline-primary">Crea</button>
            <button type="reset" class="btn btn-outline-warning"> Reset</button>
        </form>
    </div>
@endsection
