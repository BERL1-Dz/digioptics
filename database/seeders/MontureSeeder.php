<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Monture;

class MontureSeeder extends Seeder
{
    public function run()
    {
        $montures = [
            [
                'code_monture' => 'LUX001',
                'code_fournisseur' => 9, // Luxottica
                'nom_fournisseur' => 'Luxottica',
                'marque_monture' => 'Ray-Ban',
                'model_monture' => 'Wayfarer',
                'coloris' => 'Noir',
                'coloris_libellé' => 'Noir mat',
                'taille_monture' => '50-18-145',
                'type_monture' => 'Plein',
                'style_monture' => 'Classique',
                'matiere_monture' => 'Acétate',
                'genre_monture' => 'Unisexe',
                'pa_monture' => 80.00,
                'pv_monture' => 160.00
            ],
            [
                'code_monture' => 'LUX002',
                'code_fournisseur' => 9, // Luxottica
                'nom_fournisseur' => 'Luxottica',
                'marque_monture' => 'Oakley',
                'model_monture' => 'Holbrook',
                'coloris' => 'Tortoise',
                'coloris_libellé' => 'Tortue',
                'taille_monture' => '52-18-145',
                'type_monture' => 'Plein',
                'style_monture' => 'Sport',
                'matiere_monture' => 'Acétate',
                'genre_monture' => 'Unisexe',
                'pa_monture' => 90.00,
                'pv_monture' => 180.00
            ],
            [
                'code_monture' => 'SAF001',
                'code_fournisseur' => 10, // Safilo
                'nom_fournisseur' => 'Safilo',
                'marque_monture' => 'Carrera',
                'model_monture' => 'Champion',
                'coloris' => 'Or',
                'coloris_libellé' => 'Or mat',
                'taille_monture' => '48-18-140',
                'type_monture' => 'Métal',
                'style_monture' => 'Vintage',
                'matiere_monture' => 'Métal',
                'genre_monture' => 'Homme',
                'pa_monture' => 70.00,
                'pv_monture' => 140.00
            ],
            [
                'code_monture' => 'SAF002',
                'code_fournisseur' => 10, // Safilo
                'nom_fournisseur' => 'Safilo',
                'marque_monture' => 'Dior',
                'model_monture' => 'So Real',
                'coloris' => 'Rose',
                'coloris_libellé' => 'Rose gold',
                'taille_monture' => '49-17-140',
                'type_monture' => 'Métal',
                'style_monture' => 'Tendance',
                'matiere_monture' => 'Métal',
                'genre_monture' => 'Femme',
                'pa_monture' => 120.00,
                'pv_monture' => 240.00
            ],
            [
                'code_monture' => 'LUX003',
                'code_fournisseur' => 9, // Luxottica
                'nom_fournisseur' => 'Luxottica',
                'marque_monture' => 'Prada',
                'model_monture' => 'Linea Rossa',
                'coloris' => 'Noir',
                'coloris_libellé' => 'Noir brillant',
                'taille_monture' => '51-17-145',
                'type_monture' => 'Métal',
                'style_monture' => 'Luxe',
                'matiere_monture' => 'Métal',
                'genre_monture' => 'Unisexe',
                'pa_monture' => 150.00,
                'pv_monture' => 300.00
            ]
        ];

        foreach ($montures as $monture) {
            Monture::create($monture);
        }
    }
} 