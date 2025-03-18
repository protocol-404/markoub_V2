@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 p-6">
    <div class="max-w-4xl mx-auto">
        <!-- Page Header -->
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Créer une Nouvelle Navette</h1>

        <!-- Create Form -->
        <form action="{{ route('societes.navettes.store') }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
            @csrf

            <!-- Ville Départ -->
            <div class="mb-4">
                <label for="ville_depart" class="block text-sm font-medium text-gray-700">Ville de Départ</label>
                <input type="text" id="ville_depart" name="ville_depart" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
            </div>

            <!-- Ville Arrivée -->
            <div class="mb-4">
                <label for="ville_arrivee" class="block text-sm font-medium text-gray-700">Ville d'Arrivée</label>
                <input type="text" id="ville_arrivee" name="ville_arrivee" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
            </div>

            <!-- Date Début -->
            <div class="mb-4">
                <label for="date_debut" class="block text-sm font-medium text-gray-700">Date de Début</label>
                <input type="date" id="date_debut" name="date_debut" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
            </div>

            <!-- Date Fin -->
            <div class="mb-4">
                <label for="date_fin" class="block text-sm font-medium text-gray-700">Date de Fin</label>
                <input type="date" id="date_fin" name="date_fin" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
            </div>

            <!-- Heure Départ -->
            <div class="mb-4">
                <label for="heure_depart" class="block text-sm font-medium text-gray-700">Heure de Départ</label>
                <input type="time" id="heure_depart" name="heure_depart" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
            </div>

            <!-- Heure Arrivée -->
            <div class="mb-4">
                <label for="heure_arrivee" class="block text-sm font-medium text-gray-700">Heure d'Arrivée</label>
                <input type="time" id="heure_arrivee" name="heure_arrivee" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
            </div>

            <!-- Places Disponibles -->
            <div class="mb-4">
                <label for="places_disponibles" class="block text-sm font-medium text-gray-700">Places Disponibles</label>
                <input type="number" id="places_disponibles" name="places_disponibles" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
            </div>

            <!-- Description -->
            <div class="mb-6">
                <label for="description" class="block text-sm font-medium text-gray-700">Description (optionnelle)</label>
                <textarea id="description" name="description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" rows="3"></textarea>
            </div>
 <div class="mb-4">
    <label for="logo" class="block text-sm font-medium text-gray-700">Logo URL</label>
    <input type="url" id="logo" name="logo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="https://example.com/logo.png">
</div>
            <!-- Form Actions -->
            <div class="flex justify-end">
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-200 ease-in-out">
                    Créer la Navette
                </button>
            </div>
        </form>
    </div>
</div>
@endsection