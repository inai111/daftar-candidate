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
        Schema::create('skill_sets', function (Blueprint $table) {
            $table->foreignId('candidate_id')->constrained()
            ->onDelete('cascade');
            $table->foreignId('skill_id')->constrained()
            ->onDelete('cascade');

            # index
            $table->unique(['candidate_id','skill_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skill_set');
    }
};
