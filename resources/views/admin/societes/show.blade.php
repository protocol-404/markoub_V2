@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Détails de la Société</h2>

    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Nom</label>
                <p class="mt-1 text-sm text-gray-900">{{ $societe->nom }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <p class="mt-1 text-sm text-gray-900">{{ $societe->email }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Téléphone</label>
                <p class="mt-1 text-sm text-gray-900">{{ $societe->telephone }}</p>
            </div>
        </div>

        <div class="flex justify-end mt-6 space-x-4">
            <a href="{{ route('societes.edit', $societe) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-200 ease-in-out">
                Modifier
            </a>
            <form action="{{ route('societes.destroy', $societe) }}" method="POST" class="inline">
                @csrf @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-200 ease-in-out" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette société ?')">
                    Supprimer
                </button>
            </form>
            <a href="{{ route('societes.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-200 ease-in-out">
                Retour
            </a>
        </div>
    </div>
</div>
@endsection