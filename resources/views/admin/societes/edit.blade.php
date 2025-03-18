@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Modifier la Société</h2>

    <form action="{{ route('societes.update', $societe) }}" method="POST" class="bg-white rounded-lg shadow-md p-6">
        @csrf @method('PUT')
        <div class="mb-4">
            <label for="nom" class="block text-sm font-medium text-gray-700">Nom</label>
            <input type="text" name="nom" id="nom" value="{{ $societe->nom }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
        </div>
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email" value="{{ $societe->email }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
        </div>
        <div class="mb-4">
            <label for="telephone" class="block text-sm font-medium text-gray-700">Téléphone</label>
            <input type="text" name="telephone" id="telephone" value="{{ $societe->telephone }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
        </div>
        <div class="flex justify-end">
            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-200 ease-in-out">
                Mettre à jour
            </button>
        </div>
    </form>
</div>
@endsection