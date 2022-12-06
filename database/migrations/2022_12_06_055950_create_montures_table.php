<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('montures', function (Blueprint $table) {
            $table->id();
            $table->string('code_monture');
            $table->unsignedSmallInteger('code_fournisseur');
            $table->string('nom_fournisseur');
            $table->string('marque_monture');
            $table->string('model_monture');
            $table->string('coloris');
            $table->string('coloris libellé');
            $table->string('taille_monture');
            $table->string('type_monture');
            $table->string('style_monture');
            $table->string('matiere_monture');
            $table->boolean('genre_monture');
            $table->float('pa_monture');
            $table->float('pv_monture');
            $table->foreign('code_fournisseur')->references('code_fournisseur')->on('fournisseurs');
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
        Schema::dropIfExists('montures');
    }
}
