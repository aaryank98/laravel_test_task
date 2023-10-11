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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->bigInteger('property_type_id');
            $table->string('county');
            $table->string('country');
            $table->string('town');
            $table->string('postcode')->nullable();
            $table->longText('description');
            $table->string('detail_url')->nullable();
            $table->tinyText('address')->nullable();
            $table->string('image_full')->nullable();
            $table->string('image_thumbnail')->nullable();
            $table->string('latitude');
            $table->string('longitude');
            $table->tinyInteger('num_bedrooms');
            $table->tinyInteger('num_bathrooms');
            $table->integer('price');
            $table->enum('property_for', array('rent', 'sale'))->default('sale');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
