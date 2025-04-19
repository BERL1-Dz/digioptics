<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('recettes', function (Blueprint $table) {
            $table->id();
            $table->string('client_nom');
            $table->string('client_prenom');
            $table->string('client_telephone');
            
            // Vision de Loin
            $table->string('oeil_droit_sphere');
            $table->string('oeil_droit_cylindre');
            $table->string('oeil_droit_axe');
            $table->string('oeil_gauche_sphere');
            $table->string('oeil_gauche_cylindre');
            $table->string('oeil_gauche_axe');
            
            // Vision de Près
            $table->string('oeil_droit_sphere_pres')->nullable();
            $table->string('oeil_droit_cylindre_pres')->nullable();
            $table->string('oeil_droit_axe_pres')->nullable();
            $table->string('oeil_droit_addition')->nullable();
            $table->string('oeil_gauche_sphere_pres')->nullable();
            $table->string('oeil_gauche_cylindre_pres')->nullable();
            $table->string('oeil_gauche_axe_pres')->nullable();
            $table->string('oeil_gauche_addition')->nullable();
            
            // Monture et Verres
            $table->foreignId('monture_id')->constrained()->onDelete('cascade');
            $table->string('type_verre');
            
            // Informations Financières
            $table->decimal('total', 10, 2);
            $table->decimal('montant_paye', 10, 2);
            $table->decimal('reste_a_payer', 10, 2);
            
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('recettes');
    }
}; 