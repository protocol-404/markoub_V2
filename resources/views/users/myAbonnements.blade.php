@extends('layouts.app')

@section('content')
<div class="bg-gray-50 min-h-screen py-12">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="mb-8">
            <h1 class="text-3xl font-semibold text-gray-900">Mes Abonnements</h1>
            <p class="mt-1 text-sm text-gray-600">Gérez vos abonnements aux navettes</p>
        </div>

        <!-- Subscriptions Card -->
        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="px-6 py-5 border-b border-gray-200 bg-gray-50">
                <h2 class="text-lg font-medium text-gray-900">Abonnements actifs</h2>
            </div>

            @if(count($abonnements) > 0)
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <!-- Table Header -->
                        <thead>
                            <tr>
                                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Navette</th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                            </tr>
                        </thead>
                        <!-- Table Body -->
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($abonnements as $abonnement)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">{{ $abonnement->navette->nom }}</div>
                                        <div class="text-xs text-gray-500">{{ $abonnement->navette->depart }} - {{ $abonnement->navette->arrivee }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ \Carbon\Carbon::parse($abonnement->navette->date)->format('d/m/Y') }}</div>
                                        <div class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($abonnement->navette->heure)->format('H:i') }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($abonnement->status == 'en attente')
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                En attente
                                            </span>
                                        @elseif($abonnement->status == 'confirme')
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                Confirmé
                                            </span>
                                        @elseif($abonnement->status == 'annule')
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                Annulé
                                            </span>
                                        @else
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                                {{ ucfirst($abonnement->status) }}
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        @if ($abonnement->status == 'en attente')
                                            <form action="{{ route('abonnements.annuler', $abonnement->id) }}" method="POST" class="inline-flex">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir annuler cet abonnement ?')" class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors duration-150 ease-in-out">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                    Annuler
                                                </button>
                                            </form>
                                        @else
                                            <span class="text-sm text-gray-500">Non annulable</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="py-12 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">Aucun abonnement</h3>
                    <p class="mt-1 text-sm text-gray-500">Vous n'avez pas encore d'abonnements aux navettes.</p>
                    <div class="mt-6">
                        <a href="{{ route('navettes.index') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-150 ease-in-out">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Découvrir les navettes
                        </a>
                    </div>
                </div>
            @endif
        </div>

        <!-- Optional: Back to dashboard link -->
        <div class="mt-6 text-center">
            <a href="{{ route('dashboard') }}" class="text-sm font-medium text-blue-600 hover:text-blue-500">
                <span aria-hidden="true">&larr;</span> Retour au tableau de bord
            </a>
        </div>
    </div>
</div>
@endsection
