<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vents', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->foreignId('fournisseur_id')->constrained()->onDelete('cascade');
            $table->text('notes')->nullable();
            $table->decimal('total', 10, 2);
            $table->timestamps();
        });

        // Pivot tables for products
        Schema::create('vent_verre', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vent_id')->constrained()->onDelete('cascade');
            $table->foreignId('verre_id')->constrained()->onDelete('cascade');
            $table->integer('quantite');
            $table->decimal('prix_unitaire', 10, 2);
            $table->decimal('total', 10, 2);
            $table->timestamps();
        });

        Schema::create('vent_lentille', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vent_id')->constrained()->onDelete('cascade');
            $table->foreignId('lentille_id')->constrained()->onDelete('cascade');
            $table->integer('quantite');
            $table->decimal('prix_unitaire', 10, 2);
            $table->decimal('total', 10, 2);
            $table->timestamps();
        });

        Schema::create('vent_monture', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vent_id')->constrained()->onDelete('cascade');
            $table->foreignId('monture_id')->constrained()->onDelete('cascade');
            $table->integer('quantite');
            $table->decimal('prix_unitaire', 10, 2);
            $table->decimal('total', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vent_monture');
        Schema::dropIfExists('vent_lentille');
        Schema::dropIfExists('vent_verre');
        Schema::dropIfExists('vents');
    }
}
