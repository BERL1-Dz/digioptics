<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fournisseur;

class FournisseurSeeder extends Seeder
{
    public function run()
    {
        $fournisseurs = [
            [
                'code_fournisseur' => 'ESS001',
                'nom' => 'Essilor',
                'fabricant_associe' => 'EssilorLuxottica',
                'numero_fournisseur' => '+33 1 23 45 67 89',
                'mail_fournisseur' => 'contact@essilor.fr'
            ],
            [
                'code_fournisseur' => 'HOY001',
                'nom' => 'Hoya',
                'fabricant_associe' => 'Hoya Vision Care',
                'numero_fournisseur' => '+33 4 56 78 90 12',
                'mail_fournisseur' => 'contact@hoya.fr'
            ],
            [
                'code_fournisseur' => 'ZEI001',
                'nom' => 'Zeiss',
                'fabricant_associe' => 'Carl Zeiss Vision',
                'numero_fournisseur' => '+33 4 91 23 45 67',
                'mail_fournisseur' => 'contact@zeiss.fr'
            ],
            [
                'code_fournisseur' => 'NIK001',
                'nom' => 'Nikon',
                'fabricant_associe' => 'Nikon Optical',
                'numero_fournisseur' => '+33 1 23 45 67 90',
                'mail_fournisseur' => 'contact@nikon.fr'
            ],
            [
                'code_fournisseur' => 'ROD001',
                'nom' => 'Rodenstock',
                'fabricant_associe' => 'Rodenstock GmbH',
                'numero_fournisseur' => '+33 1 98 76 54 32',
                'mail_fournisseur' => 'contact@rodenstock.fr'
            ],
            [
                'code_fournisseur' => 'JNJ001',
                'nom' => 'Johnson & Johnson',
                'fabricant_associe' => 'Johnson & Johnson Vision',
                'numero_fournisseur' => '+33 1 23 45 67 91',
                'mail_fournisseur' => 'contact@jnjvision.fr'
            ],
            [
                'code_fournisseur' => 'ALC001',
                'nom' => 'Alcon',
                'fabricant_associe' => 'Alcon Laboratories',
                'numero_fournisseur' => '+33 1 23 45 67 92',
                'mail_fournisseur' => 'contact@alcon.fr'
            ],
            [
                'code_fournisseur' => 'COV001',
                'nom' => 'CooperVision',
                'fabricant_associe' => 'CooperVision Inc.',
                'numero_fournisseur' => '+33 1 23 45 67 93',
                'mail_fournisseur' => 'contact@coopervision.fr'
            ],
            [
                'code_fournisseur' => 'LUX001',
                'nom' => 'Luxottica',
                'fabricant_associe' => 'Luxottica Group',
                'numero_fournisseur' => '+33 1 23 45 67 94',
                'mail_fournisseur' => 'contact@luxottica.fr'
            ],
            [
                'code_fournisseur' => 'SAF001',
                'nom' => 'Safilo',
                'fabricant_associe' => 'Safilo Group',
                'numero_fournisseur' => '+33 1 23 45 67 95',
                'mail_fournisseur' => 'contact@safilo.fr'
            ]
        ];

        foreach ($fournisseurs as $fournisseur) {
            Fournisseur::create($fournisseur);
        }
    }
} 