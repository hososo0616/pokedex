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
        Schema::create('poke_parties', function (Blueprint $table) {
            $table->id();
            $table->string('partyname');
            $table->string('pokename1');
            $table->string('front_default1');
            $table->string('pokename2')->nullable();
            $table->string('front_default2')->nullable();
            $table->string('pokename3')->nullable();
            $table->string('front_default3')->nullable();
            $table->string('pokename4')->nullable();
            $table->string('front_default4')->nullable();
            $table->string('pokename5')->nullable();
            $table->string('front_default5')->nullable();
            $table->string('pokename6')->nullable();
            $table->string('front_default6')->nullable();
            $table->text('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('poke_parties');
    }
};
