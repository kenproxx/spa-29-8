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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('ma_don_hang')->nullable();
            $table->string('tieu_de')->nullable();
            $table->string('price')->nullable();
            $table->string('id_nguoi_dat')->nullable();
            $table->string('id_chu_spa')->nullable();
            $table->string('ngay_dat')->nullable();
            $table->string('ngay_su_dung')->nullable();
            $table->string('kakao_id')->nullable();
            $table->string('email')->nullable();
            $table->string('number_phone')->nullable();
            $table->string('visa')->nullable();
            $table->string('more_service')->nullable();
            $table->string('status')->nullable();

            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
