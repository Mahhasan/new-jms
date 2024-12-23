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
        Schema::create('manuscripts', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('journal_id');
            $table->integer('topic_id');
            $table->string('specific_area')->nullable();
            $table->string('paper_title');
            $table->string('abstract');
            $table->string('keywords');
            $table->string('cover_letter')->nullable();
            $table->string('main_file');
            $table->string('updated_file')->nullable();
            $table->string('status')->default('Under Fisrt Screening');
            $table->string('editor_comment')->nullable();
            $table->string('plagiarism_status')->nullable();
            $table->string('submission_status')->nullable();
            $table->integer('first_reviewer')->nullable();
            $table->integer('second_reviewer')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manuscripts');
    }
};
