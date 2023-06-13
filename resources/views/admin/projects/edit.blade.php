@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Modifica il tuo progetto: {{ $project->title }} </h1>
        <form action="{{ route('admin.projects.update', $project->slug) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ $project->title }}">
            </div>
            <div class="mb-3">
                <label for="title">Description</label>
                <input type="text" class="form-control" name="description" id="description"
                    value="{{ $project->description }}">
            </div>

            <div class="form-group">
                <label for="type_id">Tipo di progetto</label>
                <select name="type_id" id="type_id" class="form-control">
                    <option value="">Seleziona il tipo di progetto</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" {{ $type->id == $project->type_id ? 'selected' : '' }}>
                            {{ $type->name }}
                        </option>
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





            <button type="submit" class="btn btn-outline-primary">Modifica</button>
            <button type="reset" class="btn btn-outline-warning"> Reset</button>
        </form>
    </div>
@endsection
