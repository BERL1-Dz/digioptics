<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('vents', function (Blueprint $table) {
            // Add date_vente column if it doesn't exist
            if (!Schema::hasColumn('vents', 'date_vente')) {
                $table->date('date_vente')->nullable();
            }
        });
    }

    public function down()
    {
        Schema::table('vents', function (Blueprint $table) {
            if (Schema::hasColumn('vents', 'date_vente')) {
                $table->dropColumn('date_vente');
            }
        });
    }
}; 