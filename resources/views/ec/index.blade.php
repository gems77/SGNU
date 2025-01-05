@extends('layout.app')

@section('content')
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
      <img class="mx-auto h-10 w-auto" src="{{url('bulletin.png')}}" alt="Your Company">
      <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Créer un Elément constitutif</h2>
    </div>
  
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
      <form class="space-y-6" action="{{route("ec.addEc")}}" method="POST">
        @csrf
        @method("POST")
        <div>
          <label for="email" class="block text-sm/6 font-medium text-gray-900">Code</label>
          <div class="mt-2">
            <input type="text" name="code" id="code" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
          </div>
        </div>
        
        <div>
            <label for="email" class="block text-sm/6 font-medium text-gray-900">Nom</label>
            <div class="mt-2">
              <input type="text" name="nom" id="nom" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            </div>
        </div>
        
        <div>
            <label for="email" class="block text-sm/6 font-medium text-gray-900">Coefficient</label>
            <div class="mt-2">
              <input type="number" name="coefficient" id="coefficient" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" min="1">
            </div>
        </div>

        <div>
            <label for="email" class="block text-sm/6 font-medium text-gray-900">UE</label>
            <div class="mt-2">
                <select name="ue_id" id="semestre" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                    @foreach ($ues as $ue)
                        <option value="{{$ue->id}}">{{$ue->nom}}</option>
                    @endforeach
                </select>
            </div>
        </div>
  
        <div>
          <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Enregistrer</button>
        </div>
      </form>
    </div>
  </div>
  
@endsection
