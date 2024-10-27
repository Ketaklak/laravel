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
        Schema::create('armies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('player_id');
            $table->integer('soldiers')->default(0);
            $table->integer('archers')->default(0);
            $table->integer('cavalry')->default(0);
            $table->integer('siege_engines')->default(0);
            $table->integer('experience')->default(0);
            $table->timestamps();

            $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('armies');
    }
};
