@extends('layouts.app')

@section('content')
<div class="bg-gray-50 min-h-screen py-12">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="mb-8">
            <h1 class="text-3xl font-semibold text-gray-900">Gestion des Utilisateurs</h1>
         </div>


        <!-- Users Table Card -->
        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="px-6 py-5 border-b border-gray-200 bg-gray-50 flex justify-between items-center">
                <h2 class="text-lg font-medium text-gray-900">Liste des utilisateurs</h2>

            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <!-- Table Header -->
                    <thead>
                        <tr class="bg-gray-50">
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rôle</th>
                         </tr>
                    </thead>
                    <!-- Table Body -->
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($users as $user)
                            <tr class="hover:bg-gray-50">
                                <!-- User ID -->
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#{{ $user->id }}</td>
                                <!-- User Name -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">

                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">{{ $user->name }}</div>
                                        </div>
                                    </div>
                                </td>
                                <!-- User Email -->
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->email }}</td>
                                <!-- User Role -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <form action="{{ route('admin.modifyUserRole', $user->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <select name="role" onchange="this.form.submit()" class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                            <option value="societe" {{ $user->role == 'societe' ? 'selected' : '' }}>Société</option>
                                            <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>Utilisateur</option>
                                        </select>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection
