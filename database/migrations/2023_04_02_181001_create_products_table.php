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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('model');
            $table->string('description')->nullable()->change();
            $table->string('type')->default('Smartphone');
            $table->string('brand');
            $table->string('processor')->nullable()->change();
            $table->string('product_operating_system')->nullable()->change();
            $table->string('screen_size')->nullable()->change();
            $table->string('capacity');
            $table->string('operating_system')->nullable()->change();
            $table->string('colour')->nullable()->change();
            $table->integer('quantity')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
