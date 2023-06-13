@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="display-1 text-center fw-semibold">I miei Progetti!</h1>
        @if (session()->has('message'))
            <div class="alert alert-success">{{ session()->get('message') }}</div>
        @endif

        <a class="btn btn-outline-success my-4" href="{{ route('admin.projects.create') }}">Aggiungi nuovo progetto</a>

        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col"> #</th>
                    <th scope="col">
                        Titolo
                    </th>
                    <th scope="col">
                        Descrizione
                    </th>
                    <th scope="col">
                        Tipologia
                    </th>
                    <th scope="col">
                        Azioni disponibili
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <th scope="row">
                            {{ $project->id }}
                        </th>
                        <td>{{ $project->title }}</td>
                        <td>{{ $project->description }}</td>
                        <td>{{ $project->type ? $project->type->name : 'Nessuna tipologia disponibile' }}</td>

                        <td>
                            <div class="d-flex align-items-center justify-between">

                                <a href="{{ route('admin.projects.show', $project->slug) }}"
                                    class="btn btn-outline-primary mx-2">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <form method="POST" action="{{ route('admin.projects.destroy', $project->slug) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button data-item-title="{{ $project->title }}" type="submit"
                                        class="delete-button btn btn-outline-danger">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>


                    </tr>

            </tbody>
            @endforeach
        </table>
        {{ $projects->links('pagination::bootstrap-5') }}
        @include('admin.projects.modal-delete')
    </div>
@endsection
