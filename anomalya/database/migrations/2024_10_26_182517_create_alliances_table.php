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
        Schema::create('alliances', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('leader_id');
            $table->timestamps();

            $table->foreign('leader_id')->references('id')->on('players')->onDelete('cascade');
        });

        // Create a pivot table to manage player memberships in alliances
        Schema::create('alliance_player', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alliance_id');
            $table->unsignedBigInteger('player_id');
            $table->timestamps();

            $table->foreign('alliance_id')->references('id')->on('alliances')->onDelete('cascade');
            $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');

            $table->unique(['alliance_id', 'player_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alliance_player');
        Schema::dropIfExists('alliances');
    }
};
