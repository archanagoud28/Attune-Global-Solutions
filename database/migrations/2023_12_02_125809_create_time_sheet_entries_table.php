<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;
use App\Models\EmpDetails;
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
            $table->date('day');
            $table->integer('regular');
            $table->integer('casual');
            $table->integer('sick');
            $table->unique(['emp_id', 'day']);
            $table->foreign('emp_id')->references('emp_id')->on('emp_details')->onDelete('cascade');
        });
        $employees = EmpDetails::pluck('emp_id'); // Fetch all employee IDs

        foreach ($employees as $emp_id) {
            $startDate = Carbon::now()->startOfWeek(); // Get the start of the current week (Monday)
        
            for ($i = 0; $i < 7; $i++) {
                DB::table('time_sheet_entries')->insert([
                    'emp_id' => $emp_id,
                    'day' => $startDate->toDateString(),  // Correct format for the 'day' column
                    'regular' => 0,
                    'casual' => 0,
                    'sick' => 0,
                ]);
        
                $startDate->addDay(); // Move to the next day
            }
        }
    }   

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('time_sheet_entries');
    }
};
