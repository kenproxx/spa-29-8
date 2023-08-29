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
        Schema::table('vouchers', function (Blueprint $table) {
            $table->integer('gia_ap_dung_toi_thieu')->nullable()->default(0);
            $table->integer('phan_tram_giam')->nullable();
            $table->integer('gia_giam_toi_thieu')->nullable();
            $table->integer('gia_giam_toi_da')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
