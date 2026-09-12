<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table->string('career_title');
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('cv_path');
            $table->text('message')->nullable();
            $table->enum('status', ['pending', 'reviewed', 'rejected', 'accepted'])->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('job_applications');
    }
};
