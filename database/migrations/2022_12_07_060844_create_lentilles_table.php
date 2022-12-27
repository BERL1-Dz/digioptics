<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLentillesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lentilles', function (Blueprint $table) {
            $table->id();
            $table->integer('code_fournisseur')->unsigned();
            $table->string('fabriquant_lentille');
            $table->string('libellé');
            $table->integer('port');
            $table->string('teinte');
            $table->boolean('essie');
            $table->integer('conditionnement');
            $table->float('pv_lentille');
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
        Schema::dropIfExists('lentilles');
    }
}
