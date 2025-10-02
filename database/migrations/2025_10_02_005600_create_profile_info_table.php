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
        Schema::create('profile_info', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title'); // ex: "Junior Developer | PHP/Laravel"
            $table->string('avatar')->nullable();
            $table->text('about');
            $table->json('skills')->nullable(); // Array de habilidades
            $table->string('resume_file')->nullable(); // PDF do currículo
            $table->string('email')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('github_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_info');
    }
};
