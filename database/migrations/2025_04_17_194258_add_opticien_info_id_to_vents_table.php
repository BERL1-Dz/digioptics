<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('vents', function (Blueprint $table) {
            $table->foreignId('opticien_info_id')->nullable()->after('total')->constrained('opticien_infos')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vents', function (Blueprint $table) {
            $table->dropForeign(['opticien_info_id']);
            $table->dropColumn('opticien_info_id');
        });
    }
};
