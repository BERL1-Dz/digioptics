<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAchatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achats', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->foreignId('fournisseur_id')->constrained('fournisseurs')->onDelete('cascade');
            $table->decimal('total', 10, 2);
            $table->text('notes')->nullable();
            $table->timestamps();
        });

        Schema::create('achat_verre', function (Blueprint $table) {
            $table->id();
            $table->foreignId('achat_id')->constrained()->onDelete('cascade');
            $table->foreignId('verre_id')->constrained()->onDelete('cascade');
            $table->integer('quantite');
            $table->decimal('prix_unitaire', 10, 2);
            $table->decimal('total', 10, 2);
            $table->timestamps();
        });

        Schema::create('achat_lentille', function (Blueprint $table) {
            $table->id();
            $table->foreignId('achat_id')->constrained()->onDelete('cascade');
            $table->foreignId('lentille_id')->constrained()->onDelete('cascade');
            $table->integer('quantite');
            $table->decimal('prix_unitaire', 10, 2);
            $table->decimal('total', 10, 2);
            $table->timestamps();
        });

        Schema::create('achat_monture', function (Blueprint $table) {
            $table->id();
            $table->foreignId('achat_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('achat_monture');
        Schema::dropIfExists('achat_lentille');
        Schema::dropIfExists('achat_verre');
        Schema::dropIfExists('achats');
    }
}
