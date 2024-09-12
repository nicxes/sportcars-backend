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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('stock_number');
            $table->string('vin');
            $table->integer('year');
            $table->string('make');
            $table->string('model');
            $table->string('model_code')->nullable();
            $table->integer('price')->nullable();
            $table->text('description');
            $table->json('photos');
            $table->json('tags');
            $table->integer('days_in_stock');
            
            $table->json('features');
            $table->string('engine')->nullable();
            $table->string('body')->nullable();
            $table->string('transmission')->nullable();
            $table->string('series')->nullable();
            $table->string('series_detail')->nullable();
            $table->integer('door_count')->nullable();
            $table->integer('odometer')->nullable();
            $table->integer('engine_cylinder')->nullable();
            $table->decimal('engine_displacement', 5, 2)->nullable();
            $table->string('drivetrain')->nullable();
            $table->string('color')->nullable();
            $table->string('interior_color')->nullable();
            $table->integer('city_mpg')->nullable();
            $table->integer('highway_mpg')->nullable();
            
            $table->string('fuel_type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
