@extends('layout.app')

@section('content')
<div class="container p-5 ">
    <ul role="list" class="divide-y divide-gray-100">
        <li class="flex justify-between gap-x-6 py-5">
          <div class="flex min-w-0 gap-x-4">
            <img class="size-12 flex-none rounded-full bg-gray-50" src="{{url('diplome.png')}}" />
              <p class="text-sm/6 font-semibold text-gray-900">Gestion Etudiants</p>
              <p class="mt-1 truncate text-xs/5 text-gray-500">adminstration des étudiants</p>
            </div>
          </div>
          <div class="bg-gray-900 hidden shrink-0 sm:flex sm:flex-col sm:items-end">
            <p class="text-white text-sm/6 text-gray-900">
                <i class="fas fa-hand-point-right ml-2"></i>
                <a href="{{url('/etudiant')}}">Gérer</a>
                <i class="fas fa-arrow-right ml-2"></i> <!-- Icône de la flèche -->
            </p>     
          </div>
        </li>
    </ul>
</div>
  
<div class="container p-5 ">
    <ul role="list" class="divide-y divide-gray-100">
        <li class="flex justify-between gap-x-6 py-5">
          <div class="flex min-w-0 gap-x-4">
            <img class="size-12 flex-none rounded-full bg-gray-50" src="{{url('noter.png')}}" />
              <p class="text-sm/6 font-semibold text-gray-900">Gestion Notes</p>
              <p class="mt-1 truncate text-xs/5 text-gray-500">adminstration des notes</p>
            </div>
          </div>
          <div class="bg-gray-900 hidden shrink-0 sm:flex sm:flex-col sm:items-end">
            <p class="text-white text-sm/6 text-gray-900">
                <i class="fas fa-hand-point-right ml-2"></i>
                <a href="{{url('note')}}">Gérer</a>
                <i class="fas fa-arrow-right ml-2"></i> <!-- Icône de la flèche -->
            </p>     
          </div>
        </li>
    </ul>
</div>

<div class="container p-5 ">
    <ul role="list" class="divide-y divide-gray-100">
        <li class="flex justify-between gap-x-6 py-5">
          <div class="flex min-w-0 gap-x-4">
            <img class="size-12 flex-none rounded-full bg-gray-50" src="{{url('dossier.png')}}" />
              <p class="text-sm/6 font-semibold text-gray-900">Gestion des UEs</p>
              <p class="mt-1 truncate text-xs/5 text-gray-500">adminstration des unités d'enseignement</p>
            </div>
          </div>
          <div class="bg-gray-900 hidden shrink-0 sm:flex sm:flex-col sm:items-end">
            <p class="text-white text-sm/6 text-gray-900">
                <i class="fas fa-hand-point-right ml-2"></i>
                <a href="{{url('ue')}}">Gérer</a>
                <i class="fas fa-arrow-right ml-2"></i>
            </p>     
          </div>
        </li>
    </ul>
</div>

<div class="container p-5 ">
    <ul role="list" class="divide-y divide-gray-100">
        <li class="flex justify-between gap-x-6 py-5">
          <div class="flex min-w-0 gap-x-4">
            <img class="size-12 flex-none rounded-full bg-gray-50" src="{{url('credit.png')}}" />
              <p class="text-sm/6 font-semibold text-gray-900">Gestion des ECs</p>
              <p class="mt-1 truncate text-xs/5 text-gray-500">adminstration des Elements constitutifs</p>
            </div>
          </div>
          <div class="bg-gray-900 hidden shrink-0 sm:flex sm:flex-col sm:items-end">
            <p class="text-white text-sm/6 text-gray-900">
                <i class="fas fa-hand-point-right ml-2"></i>
                <a href="{{url('ec')}}">Gérer</a>
                <i class="fas fa-arrow-right ml-2"></i> 
            </p>     
          </div>
        </li>
    </ul>
</div>
@endsection
