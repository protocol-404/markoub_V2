@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-blue-50 to-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Elegant Header Section -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-extrabold text-gray-900 tracking-tight">
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-indigo-600 to-blue-500">
                    Navettes Disponibles
                </span>
            </h1>
            <p class="mt-3 max-w-2xl mx-auto text-lg text-gray-600">
                Trouvez et réservez votre navette idéale en quelques clics
            </p>
        </div>

        <!-- Notifications -->
        @if (session('success'))
            <div class="max-w-3xl mx-auto mb-8 transform transition-all animate-fade-in-down">
                <div class="flex p-4 bg-white border-l-4 border-green-500 rounded-lg shadow-md">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-gray-800 font-medium">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        @if (session('error'))
            <div class="max-w-3xl mx-auto mb-8 transform transition-all animate-fade-in-down">
                <div class="flex p-4 bg-white border-l-4 border-red-500 rounded-lg shadow-md">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-gray-800 font-medium">{{ session('error') }}</p>
                    </div>
                </div>
            </div>
        @endif

        @if(count($navettes) > 0)
            <!-- Modern Cards Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($navettes as $navette)
                    <div class="group relative bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                        <!-- Card Top / Image Section -->
                        <div class="relative h-44 overflow-hidden">
                            @if ($navette->logo)
                                <img src="{{ $navette->logo }}" alt="Logo {{ $navette->nom }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-blue-600 to-indigo-700 flex items-center justify-center">
                                    <svg class="w-16 h-16 text-white/80" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                    </svg>
                                </div>
                            @endif

                            <!-- Route badge -->
                            <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm rounded-full py-1 px-3 shadow-sm">
                                <div class="flex items-center space-x-1">
                                    <span class="block h-2 w-2 rounded-full bg-green-500"></span>
                                    <span class="text-xs font-semibold text-gray-800">En service</span>
                                </div>
                            </div>
                        </div>

                        <!-- Destinations Bar -->
                        <div class="bg-gradient-to-r from-indigo-600 to-blue-500 px-5 py-3 flex items-center justify-between">
                            <div class="flex items-center">
                                <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <span class="ml-2 text-white font-medium truncate">{{ $navette->ville_depart }}</span>
                            </div>
                            <div class="flex-shrink-0 mx-3">
                                <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </div>
                            <div class="flex items-center">
                                <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <span class="ml-2 text-white font-medium truncate">{{ $navette->ville_arrivee }}</span>
                            </div>
                        </div>

                        <!-- Card Content -->
                        <div class="p-5">
                            <!-- Info Grid -->
                            <div class="grid grid-cols-2 gap-4 mb-5">
                                <!-- Date -->
                                <div class="bg-gray-50 rounded-lg p-3">
                                    <div class="text-xs text-gray-500 uppercase tracking-wide">Date</div>
                                    <div class="mt-1 font-medium text-gray-800">{{ \Carbon\Carbon::parse($navette->date_debut)->format('d/m/Y') }}</div>
                                </div>

                                <!-- Heure -->
                                <div class="bg-gray-50 rounded-lg p-3">
                                    <div class="text-xs text-gray-500 uppercase tracking-wide">Départ</div>
                                    <div class="mt-1 font-medium text-gray-800">{{ \Carbon\Carbon::parse($navette->heure_depart)->format('H:i') }}</div>
                                </div>
                            </div>

                            <!-- Places Section -->
                            <div class="flex items-center justify-between mb-5">
                                <div class="flex items-center">
                                    <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                    </svg>
                                    <span class="ml-2 text-gray-700">Places disponibles</span>
                                </div>

                                @if($navette->places_disponibles > 5)
                                    <span class="bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-1 rounded-full">{{ $navette->places_disponibles }}</span>
                                @elseif($navette->places_disponibles > 0)
                                    <span class="bg-yellow-100 text-yellow-800 text-xs font-semibold px-2.5 py-1 rounded-full">{{ $navette->places_disponibles }}</span>
                                @else
                                    <span class="bg-red-100 text-red-800 text-xs font-semibold px-2.5 py-1 rounded-full">Complet</span>
                                @endif
                            </div>

                            <!-- Action Button -->
                            @if($navette->places_disponibles > 0)
                                <a href="{{ route('navettes.sabonner', $navette->id) }}" class="block w-full text-center py-3 px-4 rounded-lg bg-gradient-to-r from-indigo-600 to-blue-500 hover:from-indigo-700 hover:to-blue-600 text-white font-medium transition-all duration-200 transform hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    S'abonner maintenant
                                </a>
                            @else
                                <button disabled class="block w-full text-center py-3 px-4 rounded-lg bg-gray-200 text-gray-500 font-medium cursor-not-allowed">
                                    Navette complète
                                </button>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <!-- Beautiful Empty State -->
            <div class="max-w-lg mx-auto text-center">
                <div class="rounded-full bg-blue-100 p-6 mx-auto w-24 h-24 flex items-center justify-center">
                    <svg class="w-12 h-12 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h2 class="mt-5 text-2xl font-bold text-gray-900">Aucune navette disponible</h2>
                <p class="mt-3 text-gray-600">Nous n'avons pas trouvé de navettes disponibles en ce moment. Veuillez vérifier ultérieurement.</p>

                <div class="mt-8">
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                        Retour au tableau de bord
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>

<style>
.animate-fade-in-down {
    animation: fade-in-down 0.5s ease-out;
}

@keyframes fade-in-down {
    0% {
        opacity: 0;
        transform: translateY(-20px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>
@endsection
