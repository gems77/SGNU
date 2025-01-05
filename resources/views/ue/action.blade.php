@extends('layout.app')

@section('content')

<table class="table table-dark table-striped">
    <thead>
        <tr>
          <th scope="col">Code</th>
          <th scope="col">Nom</th>
          <th scope="col">Crédits</th>
          <th scope="col">Semestre</th>
          <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($ues as $ue)
        <tr class="border-b">
            <th scope="row" class="px-4 py-2 font-medium">{{ $ue->code }}</th>
            <td class="px-4 py-2">{{ $ue->nom }}</td>
            <td class="px-4 py-2">{{ $ue->credits_ects }}</td>
            <td class="px-4 py-2">{{ $ue->semestre }}</td>
            <td class="px-4 py-2 flex space-x-2">
                <!-- Bouton Modifier -->
                <button type="button" 
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
                    onclick="toggleModal('editModal{{ $ue->id }}')">
                    Modifier
                </button>
    
                <!-- Bouton Supprimer -->
                <button type="button" 
                    class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600"
                    onclick="toggleModal('deleteModal{{ $ue->id }}')">
                    Supprimer
                </button>
            </td>
        </tr>
    
        <!-- Modal Modification -->
        <div id="editModal{{ $ue->id }}" 
             class="fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center hidden z-50">
            <div class="bg-white rounded-lg shadow-lg p-6 w-96">
                <h2 class="text-lg font-bold mb-4">Modifier l'ue</h2>
                <form action="{{ route('ue.updateUe', $ue->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <label for="Prenom{{ $ue->id }}" class="block text-sm font-medium">Code</label>
                        <input type="text" id="Code{{ $ue->id }}" name="code" value="{{ $ue->code }}" 
                               class="border rounded px-3 py-2 w-full">
                    </div>
                    
                    <div class="mb-4">
                        <label for="Nom{{ $ue->id }}" class="block text-sm font-medium">Nom</label>
                        <input type="text" id="Nom{{ $ue->id }}" name="nom" value="{{ $ue->nom }}" 
                               class="border rounded px-3 py-2 w-full">
                    </div>

                    <div class="mb-4">
                        <label for="niveau{{ $ue->id }}" class="block text-sm font-medium">Crédit</label>
                        <input type="number" id="niveau{{ $ue->id }}" name="credits_ects" value="{{ $ue->credits_ects }}"  min="1"
                               class="border rounded px-3 py-2 w-full">
                    </div>
                    
                    <div class="mb-4">
                        <label for="niveau{{ $ue->id }}" class="block text-sm font-medium">Semestre</label>
                       <div class="mt-2">
                                <select name="semestre" id="niveau{{ $ue->id }}" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                    <option value="{{ $ue->semestre }}" selected>Semestre {{ $ue->semestre }}</option>
                                    <option value="1">Semestre 1</option>
                                    <option value="2">Semestre 2</option>
                                    <option value="3">Semestre 3</option>
                                    <option value="4">Semestre 4</option>
                                    <option value="5">Semestre 5</option>
                                    <option value="6">Semestre 6</option>
                                </select>
                            </div>
                    </div>
                    <div class="flex justify-end space-x-2">
                        <button type="button" 
                                class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600"
                                onclick="toggleModal('editModal{{ $ue->id }}')">
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
        <div id="deleteModal{{ $ue->id }}" 
             class="fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center hidden z-50">
            <div class="bg-white rounded-lg shadow-lg p-6 w-80">
                <h2 class="text-lg font-bold mb-4">Supprimer l'UE</h2>
                <p class="mb-4">Êtes-vous sûr de vouloir supprimer cette UE ?</p>
                <div class="flex justify-end space-x-2">
                    <button type="button" 
                            class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600"
                            onclick="toggleModal('deleteModal{{ $ue->id }}')">
                        Annuler
                    </button>
                    <form action="{{ route('ue.deleteUe', $ue->id) }}" method="POST">
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
