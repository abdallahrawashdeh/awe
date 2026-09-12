<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('totals_info', function (Blueprint $table) {
            $table->id();
            $table->integer('total_cities')->default(0);
            $table->integer('total_countries')->default(0);
            $table->integer('total_employees')->default(0);
            $table->integer('total_clients')->default(0);
            $table->integer('total_projects')->default(0);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('totals_info');
    }
};
