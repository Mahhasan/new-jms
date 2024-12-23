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
        Schema::create('reviewer_selections', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('journal_id');
            $table->integer('manuscript_id');
            $table->string('reviewer');
            $table->string('status')->nullable();
            $table->string('reviewer_comment')->nullable();
            $table->string('reviewed_file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviewer_selections');
    }
};
