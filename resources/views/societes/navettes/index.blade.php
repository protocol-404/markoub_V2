@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 p-6">
    <div class="max-w-7xl mx-auto">
        <!-- Page Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Mes Navettes</h1>
            <a href="{{ route('societes.navettes.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:border-blue-900 focus:ring-2 focus:ring-blue-300 transition duration-150 ease-in-out">
                Ajouter une navette
            </a>
        </div>

        <!-- Navettes Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($navettes as $navette)
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <!-- Logo -->
                    <div class="relative max-h-52">
                        @if ($navette->logo)
                            <img src="{{ $navette->logo }}" alt="Logo" class="w-full h-52 object-cover" style="height : 250px">
                        @else
                            <div class="w-full h-full bg-gray-200 flex items-center justify-center text-gray-500">
                                Pas de logo
                            </div>
                        @endif
                    </div>

                    <!-- Card Content -->
                    <div class="p-6">
                        <!-- Ville Départ et Arrivée -->
                        <h2 class="text-xl font-semibold text-gray-800">
                            {{ $navette->ville_depart }} → {{ $navette->ville_arrivee }}
                        </h2>

                        <!-- Dates -->
                        <p class="mt-2 text-sm text-gray-600">
                            <span class="font-medium">Date Début:</span> {{ $navette->date_debut }}
                        </p>
                        <p class="text-sm text-gray-600">
                            <span class="font-medium">Date Fin:</span> {{ $navette->date_fin }}
                        </p>

                        <!-- Heures -->
                        <p class="mt-2 text-sm text-gray-600">
                            <span class="font-medium">Heure Départ:</span> {{ $navette->heure_depart }}
                        </p>
                        <p class="text-sm text-gray-600">
                            <span class="font-medium">Heure Arrivée:</span> {{ $navette->heure_arrivee }}
                        </p>

                        <!-- Places Disponibles -->
                        <p class="mt-2 text-sm text-gray-600">
                            <span class="font-medium">Places Disponibles:</span> {{ $navette->places_disponibles }}
                        </p>

                        <!-- Description -->
                        <p class="mt-4 text-sm text-gray-700">
                            {{ $navette->description ?? 'Pas de description' }}
                        </p>

                        <!-- Actions -->
                        <div class="mt-6 flex space-x-4">
                            <a href="{{ route('societes.navettes.edit', $navette) }}" class="inline-flex items-center px-4 py-2 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-600 active:bg-yellow-700 focus:outline-none focus:border-yellow-700 focus:ring-2 focus:ring-yellow-300 transition duration-150 ease-in-out">
                                Modifier
                            </a>
                            <form action="{{ route('societes.navettes.destroy', $navette) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette navette ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-800 focus:outline-none focus:border-red-900 focus:ring-2 focus:ring-red-300 transition duration-150 ease-in-out">
                                    Supprimer
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection