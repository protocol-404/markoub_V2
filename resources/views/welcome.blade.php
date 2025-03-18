<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Markoub - Book Intercity Bus Tickets</title>

    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .hero-background {
            background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80');
            background-size: cover;
            background-position: center;
        }

        .app-mockup {
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.15);
            border-radius: 30px;
        }

        .gradient-button {
            background: linear-gradient(90deg, #1d4ed8, #3b82f6);
        }

        .benefit-card:hover {
            transform: translateY(-10px);
        }

        .route-card:hover {
            transform: translateY(-5px);
        }

        .testimonial-card {
            border-radius: 16px;
            overflow: hidden;
        }

        .stats-item {
            position: relative;
        }

        .stats-item::after {
            content: '';
            position: absolute;
            right: 0;
            top: 20%;
            height: 60%;
            width: 1px;
            background-color: #e5e7eb;
        }

        .stats-item:last-child::after {
            display: none;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Header/Navigation -->
    <header class="bg-white shadow-md fixed top-0 left-0 right-0 z-50">
        <nav class="container mx-auto px-4 py-4 flex items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="/" class="text-2xl font-bold text-blue-700">
                    <i class="fas fa-bus mr-2"></i> Markoub
                </a>
            </div>

            <!-- Navigation Links -->
            <div class="hidden md:flex items-center space-x-6">
                <a href="#" class="text-gray-600 hover:text-blue-700 font-medium">Home</a>
                <a href="#" class="text-gray-600 hover:text-blue-700 font-medium">Routes</a>
                <a href="#" class="text-gray-600 hover:text-blue-700 font-medium">About Us</a>
                <a href="#" class="text-gray-600 hover:text-blue-700 font-medium">Contact</a>
            </div>

            <!-- Auth Links -->
            <div class="flex items-center space-x-2">
                @if (Auth::check())
                    <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 text-blue-700 border border-blue-700 rounded-lg hover:bg-blue-700 hover:text-white transition duration-300">
                        <i class="fas fa-th-large mr-2"></i> Dashboard
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition duration-300">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="px-4 py-2 text-blue-700 border border-blue-700 rounded-lg hover:bg-blue-700 hover:text-white transition duration-300">
                        <i class="fas fa-sign-in-alt mr-2"></i> Login
                    </a>
                    <a href="{{ route('register') }}" class="px-4 py-2 gradient-button text-white rounded-lg hover:shadow-lg transition duration-300">
                        <i class="fas fa-user-plus mr-2"></i> Register
                    </a>
                @endif
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button type="button" class="text-gray-500 hover:text-blue-700 focus:outline-none">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero-background min-h-screen flex items-center pt-20">
        <div class="container mx-auto px-4 text-center py-16">
            <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 leading-tight">Find and Book Bus Tickets <span class="text-blue-400">Instantly</span></h1>
            <p class="text-xl text-white mb-12 max-w-2xl mx-auto">Travel comfortably between cities with our premium bus service. Easy booking, affordable prices, and reliable schedules.</p>

            <!-- Search Form -->
            <div class="bg-white p-8 rounded-2xl shadow-2xl max-w-4xl mx-auto mb-12">
                <form class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    <div>
                        <label for="from" class="block text-sm font-medium text-gray-700 mb-2 text-left">From</label>
                        <div class="relative">
                            <i class="fas fa-map-marker-alt absolute left-3 top-1/2 transform -translate-y-1/2 text-blue-700"></i>
                            <select id="from" name="from" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 pl-10 py-3">
                                <option value="">Select departure</option>
                                <option value="casablanca">Casablanca</option>
                                <option value="rabat">Rabat</option>
                                <option value="marrakech">Marrakech</option>
                                <option value="fes">Fes</option>
                                <option value="tangier">Tangier</option>
                                <option value="agadir">Agadir</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label for="to" class="block text-sm font-medium text-gray-700 mb-2 text-left">To</label>
                        <div class="relative">
                            <i class="fas fa-map-marker-alt absolute left-3 top-1/2 transform -translate-y-1/2 text-blue-700"></i>
                            <select id="to" name="to" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 pl-10 py-3">
                                <option value="">Select destination</option>
                                <option value="casablanca">Casablanca</option>
                                <option value="rabat">Rabat</option>
                                <option value="marrakech">Marrakech</option>
                                <option value="fes">Fes</option>
                                <option value="tangier">Tangier</option>
                                <option value="agadir">Agadir</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label for="date" class="block text-sm font-medium text-gray-700 mb-2 text-left">Date</label>
                        <div class="relative">
                            <i class="fas fa-calendar-alt absolute left-3 top-1/2 transform -translate-y-1/2 text-blue-700"></i>
                            <input type="date" id="date" name="date" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 pl-10 py-3">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2 opacity-0">Search</label>
                        <button type="submit" class="w-full gradient-button text-white py-3 px-4 rounded-lg hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-300">
                            <i class="fas fa-search mr-2"></i> Search Tickets
                        </button>
                    </div>
                </form>
            </div>

            <!-- Quick Stats -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 max-w-4xl mx-auto">
                <div class="bg-white/90 rounded-xl p-4 text-center stats-item">
                    <div class="text-blue-700 text-3xl font-bold mb-1">500+</div>
                    <div class="text-gray-700">Daily Routes</div>
                </div>
                <div class="bg-white/90 rounded-xl p-4 text-center stats-item">
                    <div class="text-blue-700 text-3xl font-bold mb-1">50+</div>
                    <div class="text-gray-700">Cities Covered</div>
                </div>
                <div class="bg-white/90 rounded-xl p-4 text-center stats-item">
                    <div class="text-blue-700 text-3xl font-bold mb-1">20+</div>
                    <div class="text-gray-700">Bus Companies</div>
                </div>
                <div class="bg-white/90 rounded-xl p-4 text-center stats-item">
                    <div class="text-blue-700 text-3xl font-bold mb-1">250K+</div>
                    <div class="text-gray-700">Happy Travelers</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Download App Section -->
    <section class="py-20 bg-gradient-to-r from-blue-700 to-blue-900 text-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-10 md:mb-0">
                    <h2 class="text-3xl md:text-4xl font-bold mb-6">Download Our Mobile App</h2>
                    <p class="text-lg text-blue-100 mb-8 max-w-lg">Get the Markoub experience on your smartphone. Book tickets, manage your journeys, and receive real-time updates with our easy-to-use mobile app.</p>

                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="bg-blue-600 p-2 rounded-lg mr-4">
                                <i class="fas fa-ticket-alt text-xl"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-xl mb-1">Book On The Go</h3>
                                <p class="text-blue-100">Purchase tickets anytime, anywhere with just a few taps</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="bg-blue-600 p-2 rounded-lg mr-4">
                                <i class="fas fa-bell text-xl"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-xl mb-1">Real-Time Notifications</h3>
                                <p class="text-blue-100">Stay updated with journey alerts and schedule changes</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="bg-blue-600 p-2 rounded-lg mr-4">
                                <i class="fas fa-percent text-xl"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-xl mb-1">Exclusive Mobile Discounts</h3>
                                <p class="text-blue-100">Get special offers only available to app users</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-wrap gap-4 mt-10">
                        <a href="#" class="flex items-center bg-black text-white px-4 py-2 rounded-lg hover:bg-gray-900 transition">
                            <i class="fab fa-apple text-3xl mr-3"></i>
                            <div class="text-left">
                                <div class="text-xs">Download on the</div>
                                <div class="text-xl font-semibold">App Store</div>
                            </div>
                        </a>

                        <a href="#" class="flex items-center bg-black text-white px-4 py-2 rounded-lg hover:bg-gray-900 transition">
                            <i class="fab fa-google-play text-3xl mr-3"></i>
                            <div class="text-left">
                                <div class="text-xs">Get it on</div>
                                <div class="text-xl font-semibold">Google Play</div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="md:w-1/2 flex justify-center">
                    <div class="relative">
                        <div class="absolute -inset-4 bg-blue-600 rounded-full opacity-20 blur-3xl"></div>
                        <img src="https://media-hosting.imagekit.io//7ae477f6af92401d/Screenshot%202025-02-27%20at%2016-59-54%20Markoub%20-%20Book%20Intercity%20Bus%20Tickets-right.png?Expires=1835342119&Key-Pair-Id=K2ZIVPTIP2VGHC&Signature=wlSNL4drsaG3hKME5LzmWqRFlrknMUjS45AV~O-~13y~hbdu3fxZuKX0~72FMA3x~rjXQpk9GNr48kJjdOK0dQfBKX-yVFLCnnOmpGEXuN2f20cdmpIxeNQfKIAs9YdFjUwlXS65LWNOjcgheTlhi4GiUxbEfAqjkWSKrvfFQnRTczjLown3BoqOpNfIuS6rzujL-bO1-0ENfCHFj8bThGB83JugCFFiFAZAhoQTLRsyIUARRf50Tz6gxKfT3O42pmxTimyayqScrtYaF~Ot0kDTRd1Hrlib-A9FTvAL4Bk78V5jYKfiHCK9ZUdshY8a5lIUPcSVjX~BHwy7HHozng__"
                        alt="Markoub Mobile App" class="app-mockup relative z-10 h-96" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Popular Routes Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold mb-4">Popular Routes</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Discover our most traveled bus routes with competitive prices and frequent departures</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Route Card 1 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200 hover:shadow-xl transition-all duration-300 route-card">
                    <div class="h-2 bg-blue-700"></div>
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-6">
                            <div>
                                <h3 class="font-bold text-xl text-gray-800">Casablanca</h3>
                                <p class="text-sm text-gray-600">Departure</p>
                            </div>
                            <div class="text-2xl text-blue-700">
                                <i class="fas fa-arrow-right"></i>
                            </div>
                            <div class="text-right">
                                <h3 class="font-bold text-xl text-gray-800">Marrakech</h3>
                                <p class="text-sm text-gray-600">Destination</p>
                            </div>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg mb-4">
                            <div class="flex justify-between mb-2">
                                <span class="text-gray-600">Journey Time</span>
                                <span class="font-semibold">3 hours</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Distance</span>
                                <span class="font-semibold">240 km</span>
                            </div>
                        </div>
                        <div class="flex justify-between border-t pt-4">
                            <div>
                                <p class="text-sm text-gray-600">Starting from</p>
                                <p class="text-2xl font-bold text-blue-700">80 MAD</p>
                            </div>
                            <a href="#" class="px-4 py-2 gradient-button text-white rounded-lg hover:shadow-lg transition duration-300">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Route Card 2 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200 hover:shadow-xl transition-all duration-300 route-card">
                    <div class="h-2 bg-blue-700"></div>
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-6">
                            <div>
                                <h3 class="font-bold text-xl text-gray-800">Rabat</h3>
                                <p class="text-sm text-gray-600">Departure</p>
                            </div>
                            <div class="text-2xl text-blue-700">
                                <i class="fas fa-arrow-right"></i>
                            </div>
                            <div class="text-right">
                                <h3 class="font-bold text-xl text-gray-800">Fes</h3>
                                <p class="text-sm text-gray-600">Destination</p>
                            </div>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg mb-4">
                            <div class="flex justify-between mb-2">
                                <span class="text-gray-600">Journey Time</span>
                                <span class="font-semibold">2.5 hours</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Distance</span>
                                <span class="font-semibold">200 km</span>
                            </div>
                        </div>
                        <div class="flex justify-between border-t pt-4">
                            <div>
                                <p class="text-sm text-gray-600">Starting from</p>
                                <p class="text-2xl font-bold text-blue-700">60 MAD</p>
                            </div>
                            <a href="#" class="px-4 py-2 gradient-button text-white rounded-lg hover:shadow-lg transition duration-300">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Route Card 3 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200 hover:shadow-xl transition-all duration-300 route-card">
                    <div class="h-2 bg-blue-700"></div>
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-6">
                            <div>
                                <h3 class="font-bold text-xl text-gray-800">Tangier</h3>
                                <p class="text-sm text-gray-600">Departure</p>
                            </div>
                            <div class="text-2xl text-blue-700">
                                <i class="fas fa-arrow-right"></i>
                            </div>
                            <div class="text-right">
                                <h3 class="font-bold text-xl text-gray-800">Agadir</h3>
                                <p class="text-sm text-gray-600">Destination</p>
                            </div>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg mb-4">
                            <div class="flex justify-between mb-2">
                                <span class="text-gray-600">Journey Time</span>
                                <span class="font-semibold">8 hours</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Distance</span>
                                <span class="font-semibold">800 km</span>
                            </div>
                        </div>
                        <div class="flex justify-between border-t pt-4">
                            <div>
                                <p class="text-sm text-gray-600">Starting from</p>
                                <p class="text-2xl font-bold text-blue-700">150 MAD</p>
                            </div>
                            <a href="#" class="px-4 py-2 gradient-button text-white rounded-lg hover:shadow-lg transition duration-300">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-12">
                <a href="#" class="inline-block px-6 py-3 border-2 border-blue-700 text-blue-700 font-semibold rounded-lg hover:bg-blue-700 hover:text-white transition duration-300">
                    View All Routes <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold mb-4">Why Choose Markoub</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Experience hassle-free bus travel with our premium services</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Benefit 1 -->
                <div class="bg-white p-8 rounded-xl shadow-md text-center benefit-card transition-all duration-300">
                    <div class="inline-block p-4 bg-blue-100 text-blue-700 rounded-full mb-6">
                        <i class="fas fa-credit-card text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Easy Payment</h3>
                    <p class="text-gray-600">Multiple payment options including credit cards, mobile payment, and cash</p>
                </div>

                <!-- Benefit 2 -->
                <div class="bg-white p-8 rounded-xl shadow-md text-center benefit-card transition-all duration-300">
                    <div class="inline-block p-4 bg-blue-100 text-blue-700 rounded-full mb-6">
                        <i class="fas fa-ticket-alt text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-4">E-Tickets</h3>
                    <p class="text-gray-600">Paperless ticketing system with QR codes sent directly to your smartphone</p>
                </div>

                <!-- Benefit 3 -->
                <div class="bg-white p-8 rounded-xl shadow-md text-center benefit-card transition-all duration-300">
                    <div class="inline-block p-4 bg-blue-100 text-blue-700 rounded-full mb-6">
                        <i class="fas fa-headset text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-4">24/7 Support</h3>
                    <p class="text-gray-600">Our dedicated customer service team is available around the clock to assist you</p>
                </div>

                <!-- Benefit 4 -->
                <div class="bg-white p-8 rounded-xl shadow-md text-center benefit-card transition-all duration-300">
                    <div class="inline-block p-4 bg-blue-100 text-blue-700 rounded-full mb-6">
                        <i class="fas fa-shield-alt text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Secure Booking</h3>
                    <p class="text-gray-600">Your personal data and payment information are protected with top-tier encryption</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold mb-4">What Our Customers Say</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Read reviews from our satisfied customers</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="testimonial-card bg-gray-50 p-6 shadow-md">
                    <div class="flex items-center mb-4">
                        <div class="bg-blue-600 w-10 h-10 rounded-full flex items-center justify-center text-white font-bold text-xl">F</div>
                        <div class="ml-4">
                            <h4 class="font-semibold">Fatima B.</h4>
                            <p class="text-sm text-gray-600">Casablanca</p>
                        </div>
                    </div>
                    <div class="text-yellow-400 mb-3">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="text-gray-700">"I use Markoub regularly for my business trips. The booking process is so simple, and the e-tickets make travel completely hassle-free. Highly recommended!"</p>
                </div>

                <!-- Testimonial 2 -->
                <div class="testimonial-card bg-gray-50 p-6 shadow-md">
                    <div class="flex items-center mb-4">
                        <div class="bg-blue-600 w-10 h-10 rounded-full flex items-center justify-center text-white font-bold text-xl">M</div>
                        <div class="ml-4">
                            <h4 class="font-semibold">Mohammed L.</h4>
                            <p class="text-sm text-gray-600">Rabat</p>
                        </div>
                    </div>
                    <div class="text-yellow-400 mb-3">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <p class="text-gray-700">"The customer service is outstanding. When my travel plans changed last minute, they helped me reschedule without any additional fees. That's the kind of service that keeps me coming back."</p>
                </div>

                <!-- Testimonial 3 -->
                <div class="testimonial-card bg-gray-50 p-6 shadow-md">
                    <div class="flex items-center mb-4">
                        <div class="bg-blue-600 w-10 h-10 rounded-full flex items-center justify-center text-white font-bold text-xl">S</div>
                        <div class="ml-4">
                            <h4 class="font-semibold">Samira K.</h4>
                            <p class="text-sm text-gray-600">Marrakech</p>
                        </div>
                    </div>
                    <div class="text-yellow-400 mb-3">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="text-gray-700">"The mobile app is a game-changer! I can book tickets while on the go, and the real-time notifications about departures are extremely helpful. Never missed a bus since I started using Markoub."</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Bus Companies Section -->
    <!-- Bus Companies Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
      <div class="text-center mb-16">
        <h2 class="text-4xl font-bold mb-4">Our Partner Companies</h2>
        <p class="text-gray-600 max-w-2xl mx-auto">We work with the best bus operators to ensure quality service</p>
      </div>
      <div class="grid grid-cols-2 md:grid-cols-6 gap-4 justify-items-center">
        <!-- Company logos -->
        <div class="bg-white p-4 rounded-lg shadow-sm h-20 w-40 flex items-center justify-center">
          <img src="https://ctm.ma/wp-content/uploads/2020/11/logo_ctm-1.png" alt="CTM" class="max-h-12">
        </div>
        <div class="bg-white p-4 rounded-lg shadow-sm h-20 w-40 flex items-center justify-center">
          <img src="https://www.supratours.ma/static/media/logo-left.4765025758bfcec2a91f.png" alt="Supratours" class="max-h-12">
        </div>
        <div class="bg-white p-4 rounded-lg shadow-sm h-20 w-40 flex items-center justify-center">
          <img src="https://www.pngfind.com/pngs/m/416-4164972_logo-sat-png-sat-guatemala-transparent-png.png" alt="SATAS" class="max-h-12">
        </div>
        <div class="bg-white p-4 rounded-lg shadow-sm h-20 w-40 flex items-center justify-center">
          <img src="https://cdn.bookaway.com/media/files/628bf2908b1aa42090152918.jpeg?quality=90&height=120" alt="Ghazala" class="max-h-12">
        </div>
        <div class="bg-white p-4 rounded-lg shadow-sm h-20 w-40 flex items-center justify-center">
          <img src="https://www.alsa.ma/o/Alsa-Marruecos-theme/images/comunes/logo-alsa-blanco.svg" alt="Voyages FADIL" class="max-h-12">
        </div>
        <div class="bg-white p-4 rounded-lg shadow-sm h-20 w-40 flex items-center justify-center">
          <img src="https://www.nejmechamal.ma/images/logo.png" alt="nejmechamal" class="max-h-12">
        </div>
      </div>
    </div>
  </section>

  <!-- Payment Methods Section -->
  <section class="py-16 bg-white">
    <div class="container mx-auto px-4">
      <div class="text-center mb-12">
        <h2 class="text-4xl font-bold mb-4">Payment Methods</h2>
        <p class="text-gray-600 max-w-2xl mx-auto">Secure and flexible payment options for your convenience</p>
      </div>
      <div class="flex flex-wrap justify-center items-center gap-8 max-w-3xl mx-auto">
        <!-- Payment logos -->
        <div class="p-4 w-32 flex items-center justify-center">
          <img src="https://cdn.freebiesupply.com/logos/large/2x/visa-logo-png-transparent.png" alt="Visa" class="h-12">
        </div>
        <div class="p-4 w-32 flex items-center justify-center">
          <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a4/Mastercard_2019_logo.svg/1200px-Mastercard_2019_logo.svg.png" alt="Mastercard" class="h-12">
        </div>
        <div class="p-4 w-32 flex items-center justify-center">
          <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/PayPal.svg/1200px-PayPal.svg.png" alt="PayPal" class="h-12">
        </div>
        <div class="p-4 w-32 flex items-center justify-center">
          <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b0/Apple_Pay_logo.svg/1200px-Apple_Pay_logo.svg.png" alt="Apple Pay" class="h-12">
        </div>
        <div class="p-4 w-32 flex items-center justify-center">
          <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fa/American_Express_logo_%282018%29.svg/1200px-American_Express_logo_%282018%29.svg.png" alt="American Express" class="h-12">
        </div>
      </div>
    </div>
  </section>

        <!-- FAQ Section -->
        <section class="py-20 bg-white">
            <div class="container mx-auto px-4">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold mb-4">Frequently Asked Questions</h2>
                    <p class="text-gray-600 max-w-2xl mx-auto">Find answers to the most common questions about our services</p>
                </div>

                <div class="max-w-3xl mx-auto">
                    <!-- FAQ Item 1 -->
                    <div class="mb-6 border-b border-gray-200 pb-6">
                        <button class="flex justify-between items-center w-full text-left font-semibold text-lg text-gray-800">
                            <span>How do I book a ticket?</span>
                            <i class="fas fa-plus text-blue-700"></i>
                        </button>
                        <div class="mt-3 text-gray-600">
                            <p>Booking a ticket is easy! Simply use our search form to select your departure city, destination, and travel date. Browse the available options, select your preferred journey, and proceed to checkout. You can pay using various payment methods, and your e-ticket will be sent directly to your email and available in your account.</p>
                        </div>
                    </div>

                    <!-- FAQ Item 2 -->
                    <div class="mb-6 border-b border-gray-200 pb-6">
                        <button class="flex justify-between items-center w-full text-left font-semibold text-lg text-gray-800">
                            <span>Can I cancel or change my ticket?</span>
                            <i class="fas fa-plus text-blue-700"></i>
                        </button>
                        <div class="mt-3 text-gray-600">
                            <p>Yes, you can cancel or change your booking up to 6 hours before departure. Log in to your account, go to "My Bookings," and select the ticket you wish to modify. Please note that some bus companies may charge a modification fee, which will be displayed before you confirm any changes.</p>
                        </div>
                    </div>

                    <!-- FAQ Item 3 -->
                    <div class="mb-6 border-b border-gray-200 pb-6">
                        <button class="flex justify-between items-center w-full text-left font-semibold text-lg text-gray-800">
                            <span>How early should I arrive at the bus station?</span>
                            <i class="fas fa-plus text-blue-700"></i>
                        </button>
                        <div class="mt-3 text-gray-600">
                            <p>We recommend arriving at the bus station at least 30 minutes before your scheduled departure time. This allows enough time for check-in, luggage handling, and boarding. For peak travel times or holidays, consider arriving 45-60 minutes early as stations may be busier than usual.</p>
                        </div>
                    </div>

                    <!-- FAQ Item 4 -->
                    <div class="mb-6 border-b border-gray-200 pb-6">
                        <button class="flex justify-between items-center w-full text-left font-semibold text-lg text-gray-800">
                            <span>What is the luggage allowance?</span>
                            <i class="fas fa-plus text-blue-700"></i>
                        </button>
                        <div class="mt-3 text-gray-600">
                            <p>Standard luggage allowance includes one large suitcase (up to 20kg) to be stored in the luggage compartment and one small hand baggage item to take onboard. Additional luggage may incur extra fees depending on the bus company. Oversized or special items should be reported in advance by contacting our customer service.</p>
                        </div>
                    </div>

                    <!-- FAQ Item 5 -->
                    <div class="mb-6">
                        <button class="flex justify-between items-center w-full text-left font-semibold text-lg text-gray-800">
                            <span>Are there discounts available?</span>
                            <i class="fas fa-plus text-blue-700"></i>
                        </button>
                        <div class="mt-3 text-gray-600">
                            <p>Yes, we offer various discounts including student discounts (with valid ID), senior citizen discounts (65+), and children's fares. We also have a loyalty program that rewards frequent travelers with points that can be redeemed for free tickets. Additionally, booking through our mobile app often gives you access to exclusive app-only discounts.</p>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-12">
                    <a href="#" class="inline-block px-6 py-3 border-2 border-blue-700 text-blue-700 font-semibold rounded-lg hover:bg-blue-700 hover:text-white transition duration-300">
                        View All FAQs <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </section>

        <!-- Newsletter Section -->
        <section class="py-16 bg-blue-700 text-white">
            <div class="container mx-auto px-4">
                <div class="max-w-3xl mx-auto text-center">
                    <h2 class="text-3xl font-bold mb-4">Stay Updated with Best Offers</h2>
                    <p class="mb-8 text-blue-100">Subscribe to our newsletter and never miss out on exclusive deals and promotions</p>

                    <form class="flex flex-col md:flex-row gap-4 justify-center">
                        <input type="email" placeholder="Your email address" class="px-4 py-3 rounded-lg w-full md:w-96 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <button type="submit" class="px-6 py-3 bg-blue-900 hover:bg-blue-800 text-white font-semibold rounded-lg transition duration-300">
                            Subscribe <i class="fas fa-paper-plane ml-2"></i>
                        </button>
                    </form>

                    <p class="mt-4 text-sm text-blue-200">By subscribing, you agree to receive marketing emails from Markoub. Don't worry, we respect your privacy.</p>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-gray-900 text-white py-16">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
                    <!-- Company Info -->
                    <div>
                        <div class="text-2xl font-bold text-white mb-6">
                            <i class="fas fa-bus mr-2"></i> Markoub
                        </div>
                        <p class="text-gray-400 mb-6">Your reliable partner for intercity bus travel across Morocco. Book tickets easily, travel comfortably.</p>
                        <div class="flex space-x-4">
                            <a href="#" class="text-gray-400 hover:text-white transition">
                                <i class="fab fa-facebook-f text-xl"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-white transition">
                                <i class="fab fa-twitter text-xl"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-white transition">
                                <i class="fab fa-instagram text-xl"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-white transition">
                                <i class="fab fa-linkedin-in text-xl"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div>
                        <h3 class="text-lg font-semibold mb-6 text-white">Quick Links</h3>
                        <ul class="space-y-3">
                            <li><a href="#" class="text-gray-400 hover:text-white transition">Home</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition">About Us</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition">Popular Routes</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition">Blog</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition">Careers</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition">Contact Us</a></li>
                        </ul>
                    </div>

                    <!-- Support -->
                    <div>
                        <h3 class="text-lg font-semibold mb-6 text-white">Support</h3>
                        <ul class="space-y-3">
                            <li><a href="#" class="text-gray-400 hover:text-white transition">Help Center</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition">FAQs</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition">Terms & Conditions</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition">Privacy Policy</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition">Ticket Cancellation</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition">Refund Policy</a></li>
                        </ul>
                    </div>

                    <!-- Contact Us -->
                    <div>
                        <h3 class="text-lg font-semibold mb-6 text-white">Contact Us</h3>
                        <ul class="space-y-4">
                            <li class="flex items-start">
                                <i class="fas fa-map-marker-alt mt-1 mr-3 text-blue-400"></i>
                                <span class="text-gray-400">123 Transport Boulevard, Casablanca, Morocco</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-phone-alt mr-3 text-blue-400"></i>
                                <span class="text-gray-400">+212 522 123 456</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-envelope mr-3 text-blue-400"></i>
                                <span class="text-gray-400">support@markoub.com</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-clock mr-3 text-blue-400"></i>
                                <span class="text-gray-400">7 Days a week, 8AM - 10PM</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="border-t border-gray-800 mt-12 pt-8 text-center text-gray-500 text-sm">
                    <p>© 2025 Markoub. All rights reserved.</p>
                    <div class="mt-4 flex justify-center space-x-6">
                        <img src="/api/placeholder/40/25" alt="Visa" class="h-6">
                        <img src="/api/placeholder/40/25" alt="Mastercard" class="h-6">
                        <img src="/api/placeholder/40/25" alt="PayPal" class="h-6">
                        <img src="/api/placeholder/40/25" alt="Apple Pay" class="h-6">
                    </div>
                </div>
            </div>
        </footer>

        <!-- Back to Top Button -->
        <a href="#" class="fixed bottom-8 right-8 bg-blue-700 text-white w-12 h-12 rounded-full flex items-center justify-center shadow-lg hover:bg-blue-800 transition-all duration-300">
            <i class="fas fa-arrow-up"></i>
        </a>

        <!-- JavaScript for interactive elements -->
        <script>
            // Simple toggle for FAQ accordions
            document.addEventListener('DOMContentLoaded', function() {
                const faqButtons = document.querySelectorAll('.faq-item button');

                faqButtons.forEach(button => {
                    button.addEventListener('click', () => {
                        const content = button.nextElementSibling;
                        const icon = button.querySelector('i');

                        // Toggle visibility
                        if (content.style.display === 'none' || content.style.display === '') {
                            content.style.display = 'block';
                            icon.classList.remove('fa-plus');
                            icon.classList.add('fa-minus');
                        } else {
                            content.style.display = 'none';
                            icon.classList.remove('fa-minus');
                            icon.classList.add('fa-plus');
                        }
                    });
                });
            });
        </script>
    </body>
    </html>
