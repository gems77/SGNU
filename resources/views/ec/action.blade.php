
@extends('layout.app')

@section('content')

<table class="table table-dark table-striped">
    <thead>
        <tr>
          <th scope="col">Code</th>
          <th scope="col">Nom</th>
          <th scope="col">Coefficient</th>
          <th scope="col">Ue</th>
          <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($ecs as $ec)
        <tr class="border-b">
            <th scope="row" class="px-4 py-2 font-medium">{{ $ec->code }}</th>
            <td class="px-4 py-2">{{ $ec->nom }}</td>
            <td class="px-4 py-2">{{ $ec->coefficient }}</td>
            <td class="px-4 py-2">{{ $ec->ue->nom }}</td>
            <td class="px-4 py-2 flex space-x-2">
                <!-- Bouton Modifier -->
                <button type="button" 
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
                    onclick="toggleModal('editModal{{ $ec->id }}')">
                    Modifier
                </button>
    
                <!-- Bouton Supprimer -->
                <button type="button" 
                    class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600"
                    onclick="toggleModal('deleteModal{{ $ec->id }}')">
                    Supprimer
                </button>
            </td>
        </tr>
    
        <!-- Modal Modification -->
        <div id="editModal{{ $ec->id }}" 
             class="fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center hidden z-50">
            <div class="bg-white rounded-lg shadow-lg p-6 w-96">
                <h2 class="text-lg font-bold mb-4">Modifier l'ec</h2>
                <form action="{{ route('ec.updateEc', $ec->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                
                    <div class="mb-4">
                        <label for="code{{ $ec->id }}" class="block text-sm font-medium">Code</label>
                        <input type="text" id="code{{ $ec->id }}" name="code" value="{{ old('code', $ec->code) }}" 
                               class="border rounded px-3 py-2 w-full" required>
                    </div>

                    <div class="mb-4">
                        <label for="nom{{ $ec->id }}" class="block text-sm font-medium">Nom</label>
                        <input type="text" id="nom{{ $ec->id }}" name="nom" value="{{ old('nom', $ec->nom) }}" 
                               class="border rounded px-3 py-2 w-full" required>
                    </div>
                
                    <div class="mb-4">
                        <label for="coefficient{{ $ec->id }}" class="block text-sm font-medium">Crédit</label>
                        <input type="number" id="coefficient{{ $ec->id }}" name="coefficient" value="{{ old('coefficient', $ec->coefficient) }}" 
                               min="1" class="border rounded px-3 py-2 w-full" required>
                    </div>
                
                    <div class="mb-4">
                        <label for="ue_id{{ $ec->id }}" class="block text-sm font-medium">UE</label>
                        <select name="ue_id" id="ue_id{{ $ec->id }}" 
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900">
                            <option value="{{ $ec->ue_id }}" selected>{{ $ec->ue->nom }}</option>
                            @foreach ($ues as $ue)
                                <option value="{{ $ue->id }}">{{ $ue->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="flex justify-end space-x-2">
                        <button type="button" 
                                class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600"
                                onclick="toggleModal('editModal{{ $ec->id }}')">
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
        <div id="deleteModal{{ $ec->id }}" 
             class="fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center hidden z-50">
            <div class="bg-white rounded-lg shadow-lg p-6 w-80">
                <h2 class="text-lg font-bold mb-4">Supprimer l'EC</h2>
                <p class="mb-4">Êtes-vous sûr de vouloir supprimer cet EC?</p>
                <div class="flex justify-end space-x-2">
                    <button type="button" 
                            class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600"
                            onclick="toggleModal('deleteModal{{ $ec->id }}')">
                        Annuler
                    </button>
                    <form action="{{ route('ec.deleteEc', $ec->id) }}" method="POST">
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
