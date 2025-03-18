<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'admin']);
        $societe = Role::create(['name' => 'societe']);
        $user = Role::create(['name' => 'user']);
    
        $superAdmin = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);
        
        $superAdmin->assignRole($admin);
    }
    
}
