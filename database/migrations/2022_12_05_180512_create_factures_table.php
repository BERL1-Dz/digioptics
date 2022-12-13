<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("factures", function (Blueprint $table) {
            $table->id();
            $table->string("facture_pour");
            $table->integer("n_facture");
            $table->string("date");
            $table->json("ref");
            $table->string("t_h_t")->nullable();
            $table->string("t_v_a")->nullable();
            $table->string("t_t_c")->nullable();
            $table->string("t_v_a_p")->nullable();
            $table->json("designation");
            $table->json("quantite");
            $table->json("p_unitaire");
            $table->float("montant");
            $table->float("total");
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
        Schema::dropIfExists("factures");
    }
}
