<x-guest-layout>
    <div class="w-full max-w-md">
        <div class="text-center mb-8">
            <div class="flex justify-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                </svg>
            </div>
            <h1 class="text-4xl font-extrabold text-gray-800 dark:text-white tracking-tight mb-2">AUTOCARS</h1>
            <p class="text-gray-600 dark:text-gray-300 text-lg">Votre voyage commence ici</p>
        </div>

        <div class="bg-white dark:bg-gray-800 shadow-2xl rounded-2xl border border-gray-100 dark:border-gray-700 overflow-hidden transform transition-all duration-300 hover:scale-[1.02]">
            <!-- Session Status -->
            <x-auth-session-status class="mb-4 px-6 pt-6" :status="session('status')" />

            <div class="p-6 sm:p-10">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-6 text-center">Connexion</h2>

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300" />
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex h-full items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>

                            <x-text-input
                                id="email"
                                class="block w-full pl-10 pr-3 py-2.5 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300"
                                type="email"
                                name="email"
                                :value="old('email')"
                                required
                                autofocus
                                autocomplete="username"
                                placeholder="{{ __('Votre adresse email') }}"
                            />
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
                    </div>


                    <!-- Password -->
                    <div>
                        <x-input-label for="password" :value="__('Password')" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300" />
                        <div class="relative">
                            <div class="absolute inset-y-0 inset-x-0 flex h-full items-center justify-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>

                            <x-text-input
                                id="password"
                                class="block w-full pl-10 pr-3 py-2.5 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300"
                                type="password"
                                name="password"
                                required
                                autocomplete="current-password"
                                placeholder="{{ __('Votre Password') }}"
                            />
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
                    </div>

                    <!-- Options Row -->
                    <div class="flex items-center justify-between">
                        <!-- Remember Me -->
                        <div class="flex items-center">
                            <input
                                id="remember_me"
                                type="checkbox"
                                class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600"
                                name="remember"
                            >
                            <label for="remember_me" class="ml-2 block text-sm text-gray-900 dark:text-gray-300">
                                {{ __('Se souvenir de moi') }}
                            </label>
                        </div>

                        <!-- Forgot Password -->
                        @if (Route::has('password.request'))
                            <a
                                href="{{ route('password.request') }}"
                                class="text-sm font-medium text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 transition-colors duration-200"
                            >
                                {{ __('Password oublié ?') }}
                            </a>
                        @endif
                    </div>

                    <!-- Login Button -->
                    <div>
                        <button
                            type="submit"
                            class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-md text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 ease-in-out transform hover:scale-[1.02] active:scale-[0.98]"
                        >
                            <span class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                                </svg>
                                {{ __('Se connecter') }}
                            </span>
                        </button>
                    </div>

                    <!-- Register Link -->
                    @if (Route::has('register'))
                        <div class="text-center mt-4">
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Pas encore de compte ?') }}
                                <a
                                    href="{{ route('register') }}"
                                    class="ml-1 font-semibold text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 transition-colors duration-200"
                                >
                                    {{ __('Créer un compte') }}
                                </a>
                            </p>
                        </div>
                    @endif
                </form>
            </div>
        </div>

        <!-- Footer -->
        <div class="text-center mt-6">
            <p class="text-sm text-gray-500 dark:text-gray-400">
                &copy; {{ date('Y') }} AUTOCARS. {{ __('Tous droits réservés.') }}
            </p>
        </div>
    </div>
</x-guest-layout>
