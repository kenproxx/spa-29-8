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
        Schema::table('products', function (Blueprint $table) {
            $table->tinyText('hot')->nullable();
            $table->tinyText('flash_sale')->nullable();
            $table->tinyText('gia_tot')->nullable();
            $table->tinyText('thinh_hanh')->nullable();
            $table->tinyText('ban_chay')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['hot','flash_sale','gia_tot','thinh_hanh','ban_chay',]);
        });
    }
};
