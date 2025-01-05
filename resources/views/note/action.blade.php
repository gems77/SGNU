
@extends('layout.app')

@section('content')

<table class="table table-dark table-striped">
    <thead>
        <tr>
          <th scope="col">Etudiant</th>
          <th scope="col">EC</th>
          <th scope="col">Note</th>
          <th scope="col">Session</th>
          <th scope="col">Date Evaluation</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($notes as $note)
        <tr class="border-b">
            <th scope="row" class="px-4 py-2 font-medium">{{ $note->etudiant->nom }} {{ $note->etudiant->prenom }}</th>
            <td class="px-4 py-2">{{ $note->ec->nom }}</td>
            <td class="px-4 py-2">{{ $note->note }}</td>
            <td class="px-4 py-2">{{ $note->session}}</td>
            <td class="px-4 py-2">{{ $note->date_evaluation}}</td>
            <td class="px-4 py-2 flex space-x-2">
                <!-- Bouton Modifier -->
                <button type="button" 
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
                    onclick="toggleModal('editModal{{ $note->id }}')">
                    Modifier
                </button>
    
                <!-- Bouton Supprimer -->
                <button type="button" 
                    class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600"
                    onclick="toggleModal('deleteModal{{ $note->id }}')">
                    Supprimer
                </button>
            </td>
        </tr>
    
        <!-- Modal Modification -->
        <div id="editModal{{ $note->id }}" 
             class="fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center hidden z-50">
            <div class="bg-white rounded-lg shadow-lg p-6 w-96">
                <h2 class="text-lg font-bold mb-4">Modifier l'etudiant</h2>
                <form action="{{ route('note.updateNote', $note->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                
                    <div>
                        <label for="ec_id{{ $note->id }}" class="block text-sm/6 font-medium text-gray-900">EC</label>
                        <div class="mt-2">
                            <select name="ec_id" id="ec_id{{ $note->id }}" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                <option value="{{ $note->ec_id }}">{{ $note->ec->nom }}</option>
                                @foreach ($ecs as $ec)
                                    <option value="{{$ec->id}}">{{$ec->nom}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div>
                        <label for="note{{ $note->id }}" class="block text-sm/6 font-medium text-gray-900">Note</label>
                        <div class="mt-2">
                          <input type="number" value="{{ $note->note }}" name="note" min="0" max="20" id="note{{ $note->id }}" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                    </div>
                    <div>
                        <label for="etudiant_id{{ $note->id }}" class="block text-sm/6 font-medium text-gray-900">Etudiants</label>
                        <div class="mt-2">
                            <select name="etudiant_id" id="etudiant_id{{ $note->id }}" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                <option selected value="{{ $note->etudiant->id }}" >{{ $note->etudiant->nom }} {{ $note->etudiant->prenom }}</option>
                                @foreach ($etudiants as $etudiant)
                                    <option value="{{$etudiant->id}}">{{$etudiant->nom}} {{$etudiant->nprenom}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div>
                        <label for="session{{ $note->id }}" class="block text-sm/6 font-medium text-gray-900">Session</label>
                        <div class="mt-2">
                            <select name="session" id="session{{ $note->id }}" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                    <option value="{{ $note->session }}" selected>{{ $note->session }} </option>
                                    <option value="Normale">Normale</option>
                                    <option value="Rattrapage">Rattrapage</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label for="date_evaluation{{ $note->id }}" class="block text-sm/6 font-medium text-gray-900">Date Evaluation</label>
                        <div class="mt-2">
                          <input type="date" value="{{ $note->date_evaluation}}"  name="date_evaluation" id="date_evaluation{{ $note->id }}" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                    </div>            
                    
                    <div class="flex justify-end space-x-2">
                        <button type="button" 
                                class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600"
                                onclick="toggleModal('editModal{{ $etudiant->id }}')">
                            Annuler
                        </button>
                        <button type="submit" 
                                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            Enregistrer
                        </button>
                    </div>
                </form>
                
            </div>
        </div>
    
        <!-- Modal Suppression -->
        <div id="deleteModal{{ $etudiant->id }}" 
             class="fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center hidden z-50">
            <div class="bg-white rounded-lg shadow-lg p-6 w-80">
                <h2 class="text-lg font-bold mb-4">Supprimer la note</h2>
                <p class="mb-4">Êtes-vous sûr de vouloir supprimer cette note?</p>
                <div class="flex justify-end space-x-2">
                    <button type="button" 
                            class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600"
                            onclick="toggleModal('deleteModal{{ $note->id }}')">
                        Annuler
                    </button>
                    <form action="{{ route('note.deleteNote', $note->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                            Supprimer
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </tbody>
    
    <script>
        function toggleModal(id) {
            const modal = document.getElementById(id);
            modal.classList.toggle('hidden');
        }
    </script>    
</table>
@endsection
