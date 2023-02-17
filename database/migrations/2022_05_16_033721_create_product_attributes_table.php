<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('product_attributes', static function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->integer('attribute_id');
            $table->string('value');
            $table->unique(['product_id', 'attribute_id'], 'product_attribute_uniqueness');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('product_attributes');
    }
};
