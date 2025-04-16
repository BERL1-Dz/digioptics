<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Patient;

class PatientSeeder extends Seeder
{
    public function run()
    {
        $patients = [
            [
                'nom' => 'KESSOUM',
                'prenom' => 'MOHAMED',
                'age' => 35,
                'adresse' => '123 Rue de la République, 75001 Paris',
                'phone' => '+33612345678'
            ],
            [
                'nom' => 'HAMZA',
                'prenom' => 'AHMED',
                'age' => 28,
                'adresse' => '45 Avenue des Champs-Élysées, 75008 Paris',
                'phone' => '+33623456789'
            ],
            [
                'nom' => 'ADDECHE',
                'prenom' => 'KAMEL',
                'age' => 42,
                'adresse' => '78 Boulevard Saint-Germain, 75006 Paris',
                'phone' => '+33634567890'
            ],
            [
                'nom' => 'LINA',
                'prenom' => 'NINA',
                'age' => 25,
                'adresse' => '12 Rue de Rivoli, 75004 Paris',
                'phone' => '+33645678901'
            ],
            [
                'nom' => 'RAFIK',
                'prenom' => 'BZDJ',
                'age' => 31,
                'adresse' => '56 Rue du Faubourg Saint-Honoré, 75008 Paris',
                'phone' => '+33656789012'
            ]
        ];

        foreach ($patients as $patient) {
            Patient::create($patient);
        }
    }
} 