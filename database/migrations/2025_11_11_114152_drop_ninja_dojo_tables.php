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
        Schema::dropIfExists('ninjas');
        Schema::dropIfExists('dojos');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('ninjas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('skill');
            $table->text('bio');
            $table->foreignId('dojo_id')->constrained();
            $table->timestamps();
        });

        Schema::create('dojos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('location');
            $table->integer('founder_id');
            $table->timestamps();
        });
    }
};
