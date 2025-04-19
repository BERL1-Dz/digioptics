<?php

namespace Database\Factories;

use App\Models\Recette;
use App\Models\Monture;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecetteFactory extends Factory
{
    protected $model = Recette::class;

    public function definition()
    {
        return [
            'client_nom' => $this->faker->lastName,
            'client_prenom' => $this->faker->firstName,
            'client_telephone' => $this->faker->phoneNumber,
            
            'oeil_droit_sphere' => $this->faker->randomElement(['-2.00', '-1.50', '-1.00', '-0.50', '0.00', '+0.50', '+1.00', '+1.50', '+2.00']),
            'oeil_droit_cylindre' => $this->faker->randomElement(['-0.50', '-0.25', '0.00', '+0.25', '+0.50']),
            'oeil_droit_axe' => $this->faker->numberBetween(0, 180),
            
            'oeil_gauche_sphere' => $this->faker->randomElement(['-2.00', '-1.50', '-1.00', '-0.50', '0.00', '+0.50', '+1.00', '+1.50', '+2.00']),
            'oeil_gauche_cylindre' => $this->faker->randomElement(['-0.50', '-0.25', '0.00', '+0.25', '+0.50']),
            'oeil_gauche_axe' => $this->faker->numberBetween(0, 180),
            
            'oeil_droit_sphere_pres' => $this->faker->randomElement(['-2.00', '-1.50', '-1.00', '-0.50', '0.00', '+0.50', '+1.00', '+1.50', '+2.00']),
            'oeil_droit_cylindre_pres' => $this->faker->randomElement(['-0.50', '-0.25', '0.00', '+0.25', '+0.50']),
            'oeil_droit_axe_pres' => $this->faker->numberBetween(0, 180),
            'oeil_droit_addition' => $this->faker->randomElement(['+1.00', '+1.25', '+1.50', '+1.75', '+2.00', '+2.25', '+2.50']),
            
            'oeil_gauche_sphere_pres' => $this->faker->randomElement(['-2.00', '-1.50', '-1.00', '-0.50', '0.00', '+0.50', '+1.00', '+1.50', '+2.00']),
            'oeil_gauche_cylindre_pres' => $this->faker->randomElement(['-0.50', '-0.25', '0.00', '+0.25', '+0.50']),
            'oeil_gauche_axe_pres' => $this->faker->numberBetween(0, 180),
            'oeil_gauche_addition' => $this->faker->randomElement(['+1.00', '+1.25', '+1.50', '+1.75', '+2.00', '+2.25', '+2.50']),
            
            'monture_id' => function() {
                return Monture::inRandomOrder()->first()->id ?? Monture::create([
                    'model_monture' => 'Default Model',
                    'couleur' => 'Black',
                    'prix_achat' => 100,
                    'prix_vente' => 200,
                    'quantite' => 10,
                    'fournisseur_id' => 1
                ])->id;
            },
            'type_verre' => $this->faker->randomElement(['HMC', 'HC', 'BB']),
            
            'total' => $this->faker->randomFloat(2, 100, 2000),
            'montant_paye' => $this->faker->randomFloat(2, 0, 2000),
            'reste_a_payer' => function (array $attributes) {
                return max(0, $attributes['total'] - $attributes['montant_paye']);
            },
            
            'notes' => $this->faker->optional()->text(200),
        ];
    }
} 