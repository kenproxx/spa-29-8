<?php

use App\Enum\ProductServiceStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('time');
            $table->decimal('price');
            $table->decimal('old_price');
            $table->integer('product_id');
            $table->longText('description');

            $table->integer('updated_by');
            $table->integer('created_by');

            $table->integer('status')->default(ProductServiceStatus::INACTIVE);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_services');
    }
};
