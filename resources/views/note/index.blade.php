@extends('layout.app')

@section('content')
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
      <img class="mx-auto h-10 w-auto" src="{{url('bulletin.png')}}" alt="Your Company">
      <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Noter un Etudiant</h2>
    </div>
  
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
      <form class="space-y-6" action="{{route("note.addNote")}}" method="POST">
        @csrf
        @method("POST")
        <div>
            <label for="email" class="block text-sm/6 font-medium text-gray-900">EC</label>
            <div class="mt-2">
                <select name="ec_id" id="semestre" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                    @foreach ($ecs as $ec)
                        <option value="{{$ec->id}}">{{$ec->nom}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <div>
            <label for="email" class="block text-sm/6 font-medium text-gray-900">Note</label>
            <div class="mt-2">
              <input type="number" name="note" min="0" max="20" id="nom" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            </div>
        </div>
        <div>
            <label for="email" class="block text-sm/6 font-medium text-gray-900">Etudiants</label>
            <div class="mt-2">
                <select name="etudiant_id" id="semestre" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                    @foreach ($etudiants as $etudiant)
                        <option value="{{$etudiant->id}}">{{$etudiant->nom}} {{$etudiant->nprenom}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div>
            <label for="email" class="block text-sm/6 font-medium text-gray-900">Session</label>
            <div class="mt-2">
                <select name="session" id="session" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        <option value="Normale">Normale</option>
                        <option value="Rattrapage">Rattrapage</option>
                </select>
            </div>
        </div>
        <div>
            <label for="email" class="block text-sm/6 font-medium text-gray-900">Date Evaluation</label>
            <div class="mt-2">
              <input type="date" name="date_evaluation" id="date_evaluation" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            </div>
        </div>
  
        <div>
          <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Enregistrer</button>
        </div>
      </form>
    </div>
  </div>
  
@endsection
