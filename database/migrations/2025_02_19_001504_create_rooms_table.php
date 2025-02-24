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
        Schema::create('room_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->json('facilities');
            // $table->text('description');
            $table->timestamps();
        });
        // Schema::create('room_facilities', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('room_type');
        //     $table->timestamps();
        // });
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('room_type_id');
            $table->foreign('room_type_id')->references('id')->on('room_types');
            // $table->foreignId('room_facilities_id');
            // $table->foreign('room_facilities_id')->references('id')->on('room_facilities');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
