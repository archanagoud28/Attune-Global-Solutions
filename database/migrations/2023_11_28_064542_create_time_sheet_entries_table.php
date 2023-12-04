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
        Schema::create('time_sheet_entries', function (Blueprint $table) {
            $table->id();
            $table->string('emp_id');
            $table->string('day');
            $table->integer('regular');
            $table->integer('casual');
            $table->integer('sick');
            $table->unique(['emp_id', 'day']);
            $table->foreign('emp_id')->references('emp_id')->on('emp_details')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('time_sheet_entries');
    }
};
