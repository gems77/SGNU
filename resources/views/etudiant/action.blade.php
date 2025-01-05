@extends('layout.app')

@section('content')

<table class="table table-dark table-striped">
    <thead>
        <tr>
          <th scope="col">Matricule</th>
          <th scope="col">Nom</th>
          <th scope="col">Prenom</th>
          <th scope="col">niveau</th>
          <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($etudiants as $etudiant)
        <tr class="border-b">
            <th scope="row" class="px-4 py-2 font-medium">{{ $etudiant->numero_etudiant }}</th>
            <td class="px-4 py-2">{{ $etudiant->nom }}</td>
            <td class="px-4 py-2">{{ $etudiant->prenom }}</td>
            <td class="px-4 py-2">{{ $etudiant->niveau }}</td>
            <td class="px-4 py-2 flex space-x-2">
                <!-- Bouton Modifier -->
                <button type="button" 
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
                    onclick="toggleModal('editModal{{ $etudiant->id }}')">
                    Modifier
                </button>
    
                <!-- Bouton Supprimer -->
                <button type="button" 
                    class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600"
                    onclick="toggleModal('deleteModal{{ $etudiant->id }}')">
                    Supprimer
                </button>
            </td>
        </tr>
    
        <!-- Modal Modification -->
        <div id="editModal{{ $etudiant->id }}" 
             class="fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center hidden z-50">
            <div class="bg-white rounded-lg shadow-lg p-6 w-96">
                <h2 class="text-lg font-bold mb-4">Modifier l'étudiant</h2>
                <form action="{{ route('etudiant.updateEtudiant', $etudiant->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="Nom{{ $etudiant->id }}" class="block text-sm font-medium">Nom</label>
                        <input type="text" id="Nom{{ $etudiant->id }}" name="nom" value="{{ $etudiant->nom }}" 
                               class="border rounded px-3 py-2 w-full">
                    </div>
                    <div class="mb-4">
                        <label for="Prenom{{ $etudiant->id }}" class="block text-sm font-medium">Prénom</label>
                        <input type="text" id="Prenom{{ $etudiant->id }}" name="prenom" value="{{ $etudiant->prenom }}" 
                               class="border rounded px-3 py-2 w-full">
                    </div>
                    <div class="mb-4">
                        <label for="niveau{{ $etudiant->id }}" class="block text-sm font-medium">Niveau</label>
                       <div class="mt-2">
                                <select name="niveau" id="niveau{{ $etudiant->id }}" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                    <option value="{{ $etudiant->niveau }}" selected>{{ $etudiant->niveau }}</option>
                                    <option value="L1">L1</option>
                                    <option value="L2">L2</option>
                                    <option value="L3">L3</option>
                                </select>
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
                <h2 class="text-lg font-bold mb-4">Supprimer l'étudiant</h2>
                <p class="mb-4">Êtes-vous sûr de vouloir supprimer cet étudiant ?</p>
                <div class="flex justify-end space-x-2">
                    <button type="button" 
                            class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600"
                            onclick="toggleModal('deleteModal{{ $etudiant->id }}')">
                        Annuler
                    </button>
                    <form action="{{ route('etudiant.deleteEtudiant', $etudiant->id) }}" method="POST">
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
