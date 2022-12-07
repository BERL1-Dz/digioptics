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
            $table->string('code_lentille');
            $table->string('code_fournisseur')->unsigned();
            $table->string('nom_fournisseur')->unsigned();
            $table->string('fabriquant_lentille');
            $table->string('type_lentille');
            $table->string('correction');
            $table->float('pa_lentille');
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
