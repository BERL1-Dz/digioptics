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
            // Vision de Loin - Right Eye
            $table->string('oeil_droit_sphere')->nullable();
            $table->string('oeil_droit_cylindre')->nullable();
            $table->string('oeil_droit_axe')->nullable();
            // Vision de Loin - Left Eye
            $table->string('oeil_gauche_sphere')->nullable();
            $table->string('oeil_gauche_cylindre')->nullable();
            $table->string('oeil_gauche_axe')->nullable();
            // Vision de Près - Right Eye
            $table->string('oeil_droit_sphere_pres')->nullable();
            $table->string('oeil_droit_cylindre_pres')->nullable();
            $table->string('oeil_droit_axe_pres')->nullable();
            $table->string('oeil_droit_addition')->nullable();
            // Vision de Près - Left Eye
            $table->string('oeil_gauche_sphere_pres')->nullable();
            $table->string('oeil_gauche_cylindre_pres')->nullable();
            $table->string('oeil_gauche_axe_pres')->nullable();
            $table->string('oeil_gauche_addition')->nullable();
            // Other fields
            $table->enum('type_verre', ['HMC', 'HC', 'BB']);
            $table->foreignId('monture_id')->constrained()->onDelete('cascade');
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