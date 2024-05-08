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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id')->nullable(true)->default(null);
            $table->string('code', 255)->nullable(false);
            $table->string('sku_code', 255)->nullable(false);
            $table->string('name', 255)->nullable(true)->default(null);
            $table->tinyInteger('status')->nullable(true)->default(null);
            $table->integer('zaiko')->nullable(true)->default(0);
            $table->float('price', 8, 2)->nullable(true)->default(0);
            $table->float('sale_price', 8, 2)->nullable(true)->default(0);
            $table->text('memo')->nullable(true)->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
