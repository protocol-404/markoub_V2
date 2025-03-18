<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Vérifier si les rôles existent avant de les créer
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $societeRole = Role::firstOrCreate(['name' => 'societe']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        // Vérifier si l'admin existe déjà
        if (!User::where('email', 'admin@example.com')->exists()) {
            $admin = User::create([
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
            ]);
            $admin->assignRole($adminRole);
        }

        // Vérifier si la société existe déjà
        if (!User::where('email', 'societe@example.com')->exists()) {
            $societe = User::create([
                'name' => 'Transport Société',
                'email' => 'societe@example.com',
                'password' => Hash::make('password'),
            ]);
            $societe->assignRole($societeRole);
        }

        // Vérifier si l'utilisateur normal existe déjà
        if (!User::where('email', 'user@example.com')->exists()) {
            $user = User::create([
                'name' => 'Client',
                'email' => 'user@example.com',
                'password' => Hash::make('password'),
            ]);
            $user->assignRole($userRole);
        }
    }
}
