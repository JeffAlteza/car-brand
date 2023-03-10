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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('price');
            $table->string('description');
            $table->string('image')->nullable();
            // $table->integer('carable_id');
            // $table->string('carable_type');
            // $table->foreignId('brand_id')->constrained('brands')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
        
        Schema::create('carables', function (Blueprint $table) {
            // $table->unique(['carrable_id', 'carable_type']);
            $table->foreignId('car_id')->constrained('cars')->onDelete('cascade');
            $table->integer('carable_id');
            $table->string('carable_type');
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
        Schema::dropIfExists('carable');
    }
};
