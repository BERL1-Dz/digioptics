<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OpticienInfo;

class OpticienInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OpticienInfo::create([
            'nom_entreprise' => 'DigiOptics',
            'adresse' => '123 Rue de la Vision, 75001 Paris',
            'telephone' => '+33 1 23 45 67 89',
            'email' => 'contact@digioptics.fr',
            'site_web' => 'www.digioptics.fr',
            'logo' => 'logo.png',
            'siret' => '123 456 789 00012',
            'tva' => 'FR 12 345678900',
            'is_active' => true
        ]);
    }
}
