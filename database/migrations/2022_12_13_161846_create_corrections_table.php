<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorrectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corrections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('type_vision');
            $table->date('date')->nullable();
            $table->float('sph_od');
            $table->float('sph_og');
            $table->float('cly_od');
            $table->float('cly_og');
            $table->float('add_od');
            $table->float('add_og');
            $table->integer('axe_od');
            $table->integer('axe_og');
            $table->integer('PD');
            $table->integer('Near_PD');
            $table->string('option');
            $table->unsignedBigInteger('patient_id')->nullable();
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
        Schema::dropIfExists('corrections');
    }
}
