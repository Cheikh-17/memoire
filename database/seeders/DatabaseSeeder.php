<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
            'password' => bcrypt('password'),
            'is_hidden' => false,
             
        ]);
    }
}
