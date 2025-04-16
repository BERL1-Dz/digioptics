<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Verre;

class VerreSeeder extends Seeder
{
    public function run()
    {
        $verres = [
            [
                'code_verre' => 1001,
                'code_fournisseur' => 1, // Essilor
                'index_verre' => 1.5,
                'material' => 'Minéral',
                'diametre' => 65,
                'surface' => 'Sphérique',
                'sph' => '-2.00',
                'cly' => '-0.50',
                'option' => 'Anti-reflet',
                'pa_verre' => 50.00,
                'pv_verre' => 120.00
            ],
            [
                'code_verre' => 1002,
                'code_fournisseur' => 1, // Essilor
                'index_verre' => 1.6,
                'material' => 'Organique',
                'diametre' => 70,
                'surface' => 'Asphérique',
                'sph' => '-4.00',
                'cly' => '-1.25',
                'option' => 'Anti-reflet + Anti-rayures',
                'pa_verre' => 80.00,
                'pv_verre' => 180.00
            ],
            [
                'code_verre' => 2001,
                'code_fournisseur' => 2, // Hoya
                'index_verre' => 1.67,
                'material' => 'Organique',
                'diametre' => 75,
                'surface' => 'Asphérique',
                'sph' => '-6.00',
                'cly' => '-2.00',
                'option' => 'Anti-reflet + Anti-rayures + Anti-lumière bleue',
                'pa_verre' => 120.00,
                'pv_verre' => 250.00
            ],
            [
                'code_verre' => 3001,
                'code_fournisseur' => 3, // Zeiss
                'index_verre' => 1.74,
                'material' => 'Organique',
                'diametre' => 70,
                'surface' => 'Asphérique',
                'sph' => '-8.00',
                'cly' => '-3.00',
                'option' => 'Anti-reflet + Anti-rayures + Anti-lumière bleue + Photochromique',
                'pa_verre' => 200.00,
                'pv_verre' => 400.00
            ],
            [
                'code_verre' => 4001,
                'code_fournisseur' => 4, // Nikon
                'index_verre' => 1.5,
                'material' => 'Minéral',
                'diametre' => 65,
                'surface' => 'Sphérique',
                'sph' => '+2.00',
                'cly' => '+0.50',
                'option' => 'Anti-reflet',
                'pa_verre' => 45.00,
                'pv_verre' => 110.00
            ]
        ];

        foreach ($verres as $verre) {
            Verre::create($verre);
        }
    }
} 