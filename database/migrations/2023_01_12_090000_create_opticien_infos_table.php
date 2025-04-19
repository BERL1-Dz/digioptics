<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('opticien_infos', function (Blueprint $table) {
            $table->id();
            $table->string('nom_entreprise');
            $table->string('adresse');
            $table->string('code_postal')->nullable();
            $table->string('ville')->nullable();
            $table->string('telephone');
            $table->string('email')->nullable();
            $table->string('site_web')->nullable();
            $table->string('logo_path')->nullable();
            $table->string('numero_finess')->nullable();
            $table->string('numero_siret')->nullable();
            $table->string('tva_numero')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('opticien_infos');
    }
}; 