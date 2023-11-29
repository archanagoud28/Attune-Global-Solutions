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
            $table->date('week_start_date');
            $table->json('weekly_hours')->default(json_encode(['mon' => 0, 'tue' => 0, 'wed' => 0, 'thu' => 0, 'fri' => 0, 'sat' => 0, 'sun' => 0]));
            $table->boolean('regular')->default(false); 
            $table->boolean('leave')->default(false);             
            $table->boolean('sick')->default(false);           
              $table->boolean('casual')->default(false);
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
