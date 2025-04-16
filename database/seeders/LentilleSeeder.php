<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lentille;

class LentilleSeeder extends Seeder
{
    public function run()
    {
        $lentilles = [
            [
                'code_fournisseur' => 6, // Johnson & Johnson
                'fabriquant_lentille' => 'Johnson & Johnson',
                'libellé' => 'Acuvue Oasys',
                'port' => 14,
                'teinte' => 'Naturel',
                'essie' => true,
                'conditionnement' => 6,
                'pv_lentille' => 25.00
            ],
            [
                'code_fournisseur' => 6, // Johnson & Johnson
                'fabriquant_lentille' => 'Johnson & Johnson',
                'libellé' => 'Acuvue Moist',
                'port' => 1,
                'teinte' => 'Naturel',
                'essie' => true,
                'conditionnement' => 30,
                'pv_lentille' => 20.00
            ],
            [
                'code_fournisseur' => 7, // Alcon
                'fabriquant_lentille' => 'Alcon',
                'libellé' => 'Dailies Total1',
                'port' => 1,
                'teinte' => 'Naturel',
                'essie' => true,
                'conditionnement' => 30,
                'pv_lentille' => 30.00
            ],
            [
                'code_fournisseur' => 7, // Alcon
                'fabriquant_lentille' => 'Alcon',
                'libellé' => 'Air Optix Colors',
                'port' => 30,
                'teinte' => 'Bleu',
                'essie' => false,
                'conditionnement' => 6,
                'pv_lentille' => 35.00
            ],
            [
                'code_fournisseur' => 8, // CooperVision
                'fabriquant_lentille' => 'CooperVision',
                'libellé' => 'Biofinity',
                'port' => 30,
                'teinte' => 'Naturel',
                'essie' => true,
                'conditionnement' => 6,
                'pv_lentille' => 28.00
            ]
        ];

        foreach ($lentilles as $lentille) {
            Lentille::create($lentille);
        }
    }
} 