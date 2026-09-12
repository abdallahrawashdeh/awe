<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ceo_infos', function (Blueprint $table) {
            $table->id();
            $table->string('ceo_image')->nullable();
            $table->string('company_name');
            $table->string('ceo_name');
            $table->string('ceo_title');
            $table->text('ceo_content');
            $table->integer('ceo_years');
            $table->integer('ceo_projects');
            $table->integer('ceo_client_satisfaction');
            $table->text('ceo_core_expertise');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ceo_infos');
    }
};
