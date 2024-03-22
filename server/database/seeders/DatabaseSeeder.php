<?php

namespace Database\Seeders;

use App\Models\Chambres;
use App\Models\Maladies;
use App\Models\Medecins;
use App\Models\Patient;
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
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        // 'nom',
        // 'prenom',
        // 'specialite',
        // 'adresse',
        // 'tel',
        // 'email',


        // seed medecin with his model
        Medecins::factory()->create([
            'nom' => 'Test Medecin',
            'prenom' => 'Test Medecin',
            'specialite' => 'Test Medecin',
            'adresse' => 'Test Medecin',
            'tel' => 'Test Medecin',
            'email' => 'test@example.com',
        ]);


        // Maladies
        Maladies::factory()->create([
            'nom' => 'grippe',
            'categorie' => 'virus',
            'gravite' => 'modere',
            'autres' => 'aucun',
        ]);

        Maladies::factory()->create([
            'nom' => 'sain',
            'categorie' => 'aucun',
            'gravite' => 'aucun',
            'autres' => 'aucun',
        ]);

        // seed patient with maladies
        Patient::factory()->create([
            'nom' => 'Test Patient',
            'prenom' => 'Test Patient',
            'age' => 20,
            'adresse' => 'Test Patient',
            'tel' => 'Test Patient',
            'diagnostic' => 'Test Patient',
            'uuid' => 'Test Patient',
            'maladie_id' => 1,
        ]);

        Chambres::factory(10)->create();


        // create 10 patients
        Patient::factory(10)->create();


    }
}
