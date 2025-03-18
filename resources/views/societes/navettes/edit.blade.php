@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 p-6">
    <div class="max-w-4xl mx-auto">
        <!-- Page Header -->
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Modifier la Navette</h2>

        <!-- Error Messages -->
        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded" role="alert">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Edit Form -->
        <form action="{{ route('societes.navettes.update', $navette->id) }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
            @csrf
            @method('PUT')

            <!-- Ville Départ -->
            <div class="mb-4">
                <label for="ville_depart" class="block text-sm font-medium text-gray-700">Ville de Départ</label>
                <input type="text" id="ville_depart" name="ville_depart" value="{{ old('ville_depart', $navette->ville_depart) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
            </div>

            <!-- Ville Arrivée -->
            <div class="mb-4">
                <label for="ville_arrivee" class="block text-sm font-medium text-gray-700">Ville d'Arrivée</label>
                <input type="text" id="ville_arrivee" name="ville_arrivee" value="{{ old('ville_arrivee', $navette->ville_arrivee) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
            </div>

            <!-- Date Début -->
            <div class="mb-4">
                <label for="date_debut" class="block text-sm font-medium text-gray-700">Date de Début</label>
                <input type="date" id="date_debut" name="date_debut" value="{{ old('date_debut', $navette->date_debut) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
            </div>

            <!-- Date Fin -->
            <div class="mb-4">
                <label for="date_fin" class="block text-sm font-medium text-gray-700">Date de Fin</label>
                <input type="date" id="date_fin" name="date_fin" value="{{ old('date_fin', $navette->date_fin) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
            </div>

            <!-- Heure Départ -->
            <div class="mb-4">
                <label for="heure_depart" class="block text-sm font-medium text-gray-700">Heure de Départ</label>
                <input type="time" id="heure_depart" name="heure_depart" value="{{ old('heure_depart', $navette->heure_depart) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
            </div>

            <!-- Heure Arrivée -->
            <div class="mb-4">
                <label for="heure_arrivee" class="block text-sm font-medium text-gray-700">Heure d'Arrivée</label>
                <input type="time" id="heure_arrivee" name="heure_arrivee" value="{{ old('heure_arrivee', $navette->heure_arrivee) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
            </div>

            <!-- Places Disponibles -->
            <div class="mb-4">
                <label for="places_disponibles" class="block text-sm font-medium text-gray-700">Places Disponibles</label>
                <input type="number" id="places_disponibles" name="places_disponibles" value="{{ old('places_disponibles', $navette->places_disponibles) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required min="1">
            </div>

            <!-- Description -->
            <div class="mb-6">
                <label for="description" class="block text-sm font-medium text-gray-700">Description (optionnelle)</label>
                <textarea id="description" name="description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" rows="3">{{ old('description', $navette->description) }}</textarea>
            </div>
 <div class="mb-4">
    <label for="logo" class="block text-sm font-medium text-gray-700">Logo URL</label>
    <input type="url" id="logo" name="logo" value="{{ old('logo', $navette->logo) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="https://example.com/logo.png">
  
</div>
            <!-- Form Actions -->
            <div class="flex justify-end space-x-4">
                <a href="{{ route('societes.navettes.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-200 ease-in-out">
                    Annuler
                </a>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-200 ease-in-out">
                    Enregistrer
                </button>
            </div>
        </form>
    </div>
</div>
@endsection