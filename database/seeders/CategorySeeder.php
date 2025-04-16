<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['nomination' => 'Lunettes de vue'],
            ['nomination' => 'Lunettes de soleil'],
            ['nomination' => 'Lentilles de contact'],
            ['nomination' => 'Accessoires'],
            ['nomination' => 'Étuis'],
            ['nomination' => 'Produits d\'entretien'],
            ['nomination' => 'Solutions pour lentilles'],
            ['nomination' => 'Lunettes de sport'],
            ['nomination' => 'Lunettes de lecture'],
            ['nomination' => 'Lunettes de sécurité']
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
} 