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
            $table->string('client_nom')->nullable();
            $table->string('client_prenom')->nullable();
            $table->foreignId('patient_id')->constrained()->onDelete('cascade');
            $table->string('client_telephone')->nullable();
            
            // Vision de Loin
            $table->string('oeil_droit_sphere')->nullable();
            $table->string('oeil_droit_cylindre')->nullable();
            $table->string('oeil_droit_axe')->nullable();
            $table->string('oeil_gauche_sphere')->nullable();
            $table->string('oeil_gauche_cylindre')->nullable();
            $table->string('oeil_gauche_axe')->nullable();
            
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
            $table->foreignId('monture_id')->constrained()->onDelete('cascade')->nullable();
            $table->string('type_verre')->nullable();
            $table->decimal('monture_price', 10, 2)->default(0);
            $table->decimal('lens_price', 10, 2)->default(0);
            
            // Informations Financières
            $table->decimal('total', 10, 2)->default(0);
            $table->decimal('montant_paye', 10, 2)->default(0);
            $table->decimal('reste_a_payer', 10, 2)->default(0);
            $table->boolean('status')->nullable();
            $table->timestamp('ready_at')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('recettes');
    }
}; 