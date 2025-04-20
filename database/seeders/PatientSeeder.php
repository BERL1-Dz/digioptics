<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Patient;
use Carbon\Carbon;

class PatientSeeder extends Seeder
{
    public function run()
    {
        $patients = [
            [
                'nom' => 'KESSOUM',
                'prenom' => 'MOHAMED',
                'date_naissance' => Carbon::now()->subYears(35),
                'telephone' => '+33612345678',
                'email' => 'mohamed.kessoum@example.com',
                'groupe_sanguin' => 'A+',
                'allergies' => 'Pollen, Poussière',
                'antecedents' => 'Hypertension artérielle'
            ],
            [
                'nom' => 'HAMZA',
                'prenom' => 'AHMED',
                'date_naissance' => Carbon::now()->subYears(28),
                'telephone' => '+33623456789',
                'email' => 'ahmed.hamza@example.com',
                'groupe_sanguin' => 'B+',
                'allergies' => 'Aucune',
                'antecedents' => 'Aucun'
            ],
            [
                'nom' => 'ADDECHE',
                'prenom' => 'KAMEL',
                'date_naissance' => Carbon::now()->subYears(42),
                'telephone' => '+33634567890',
                'email' => 'kamel.addeche@example.com',
                'groupe_sanguin' => 'O+',
                'allergies' => 'Pénicilline',
                'antecedents' => 'Diabète type 2'
            ],
            [
                'nom' => 'LINA',
                'prenom' => 'NINA',
                'date_naissance' => Carbon::now()->subYears(25),
                'telephone' => '+33645678901',
                'email' => 'nina.lina@example.com',
                'groupe_sanguin' => 'AB+',
                'allergies' => 'Aucune',
                'antecedents' => 'Aucun'
            ],
            [
                'nom' => 'RAFIK',
                'prenom' => 'BZDJ',
                'date_naissance' => Carbon::now()->subYears(31),
                'telephone' => '+33656789012',
                'email' => 'rafik.bzdj@example.com',
                'groupe_sanguin' => 'A-',
                'allergies' => 'Arachides',
                'antecedents' => 'Asthme'
            ]
        ];

        foreach ($patients as $patient) {
            Patient::create($patient);
        }
    }
} 