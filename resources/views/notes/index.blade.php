@extends('layouts.app')

@section('content')
    <h1>Liste des Notes</h1>
    <a href="{{ route('notes.create') }}" class="btn btn-primary">Ajouter une Note</a>
    <table class="table">
        <thead>
            <tr>
                <th>Étudiant</th>
                <th>EC</th>
                <th>Note</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($notes as $note)
                <tr>
                    <td>{{ $note->etudiant->nom }} {{ $note->etudiant->prenom }}</td>
                    <td>{{ $note->ec->code }}</td>
                    <td>{{ $note->note }}</td>
                    <td>
                        <a href="{{ route('notes.edit', $note->id) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('notes.destroy', $note->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('Êtes-vous sûr ?')">Supprimer</button>
                        </form> 
                    </td>
                </tr>
            @endforeach
            <form action="{{ route('notes.store') }}" method="POST">
                @csrf
                <select name="ec_id">
                    @foreach($ecs as $ec)
                        <option value="{{ $ec->id }}">{{ $ec->code }} - {{ $ec->nom }}</option>
                    @endforeach
                </select>
                <input type="number" name="note" min="0" max="20" step="0.25">
                <select name="session">
                    <option value="normale">Session Normale</option>
                    <option value="rattrapage">Rattrapage</option>
                </select>
                <button type="submit">Enregistrer</button>
            </form>
        </tbody>
    </table>
@endsection
