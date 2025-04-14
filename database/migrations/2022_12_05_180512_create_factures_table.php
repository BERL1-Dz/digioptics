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
            $table->string("n_facture");
            $table->date("date");
            $table->json("ref")->nullable();
            $table->decimal("t_h_t", 10, 2)->default(0);
            $table->decimal("t_v_a", 10, 2)->default(0);
            $table->decimal("t_t_c", 10, 2)->default(0);
            $table->decimal("t_v_a_p", 5, 2)->default(20);
            $table->json("designation")->nullable();
            $table->json("quantite")->nullable();
            $table->json("p_unitaire")->nullable();
            $table->json("montant")->nullable();
            $table->unsignedBigInteger('patient_id');
            $table->timestamps();

            // Add foreign key constraint
            $table->foreign('patient_id')
                  ->references('id')
                  ->on('patients')
                  ->onDelete('cascade');
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
