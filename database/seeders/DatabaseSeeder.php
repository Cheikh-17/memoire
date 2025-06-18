<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            
            'nom' => 'Adama',
            'prenom' => 'Diop',
            'email' => 'adama@gmail.com',
            'adresse' => 'dakar',
            'telephone' => '156289087',
            'profil' => 'PATIENT',
            'password' => Hash::make('password'),
            'is_hidden' => false,

            'nom' => 'Cheikh',
            'prenom' => 'Diop',
            'email' => 'cheikh@gmail.com',
            'adresse' => 'mbour',
            'telephone' => '156289087',
            'profil' => 'ADMINISTRATEUR',
            'password' => Hash::make('password'),
            'is_hidden' => false,
             
        ]);
    }
}
