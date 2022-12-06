<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verres', function (Blueprint $table) {
            $table->id();
            $table->integer('code_verre');
            $table->integer('code_fournisseur')->unsigned();
            $table->float('index_verre');
            $table->string('material');
            $table->mediumInteger('diametre');
            $table->string('surface');
            $table->string('sph');
            $table->string('cly');
            $table->string('option');
            $table->float('pa_verre');
            $table->float('pv_verre');
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
        Schema::dropIfExists('verres');
    }
}
