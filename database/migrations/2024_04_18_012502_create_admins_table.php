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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('store_name', 255)->nullable(false)->comment('店舗名称');
            $table->string('name', 255)->nullable(true)->default(null);
            $table->string('zip', 255)->nullable(true)->default(null);
            $table->string('address', 255)->nullable(true)->default(null);
            $table->string('address_other', 255)->nullable(true)->default(null);
            $table->string('tel', 255)->nullable(true)->default(null);
            $table->string('fax', 255)->nullable(true)->default(null);
            $table->string('email', 255)->nullable(false);
            $table->string('password', 255)->nullable(false);
            $table->string('bank', 255)->nullable(true)->default(null);
            $table->tinyInteger('bank_type')->nullable(true)->default(null);
            $table->string('bank_number', 255)->nullable(true)->default(null);
            $table->string('bank_meigi', 255)->nullable(true)->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
