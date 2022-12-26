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
            $table->string('sph_od')->nullable();
            $table->string('sph_og')->nullable();
            $table->string('cly_od')->nullable();
            $table->string('cly_og')->nullable();
            $table->string('add_od')->nullable();
            $table->string('add_og')->nullable();
            $table->string('axe_od')->nullable();
            $table->string('axe_og')->nullable();
            $table->integer('PD');
            $table->integer('Near_PD')->nullable();
            $table->string('option');
            $table->unsignedBigInteger('patient_id')->nullable();
            $table->unsignedBigInteger('monture_id')->nullable();
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
