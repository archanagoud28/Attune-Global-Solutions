<?php

namespace App\Livewire;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\TimeSheetEntry;

class TimeSheetDisplay extends Component
{
    
    public $tab = "timeSheet";
    public $schedules;
    public $index;
    public $daysOfWeek;
    public $hours = [];
     // Declare the variable

     public function mount()
     {
         // Initialize $daysOfWeek with an array of DateTime objects representing the days of the current week
         $this->daysOfWeek = [];
         $startDate = now()->startOfWeek(); // Start with the current week's start date
     
         // Populate $daysOfWeek with the days of the current week as DateTime objects
         for ($i = 0; $i < 7; $i++) {
             $this->daysOfWeek[] = clone $startDate; // Clone the date to avoid referencing the same object
             $startDate->addDay(); // Move to the next day
         }
     }
     
    

  
   
    public function render()
    {
        // Retrieve time sheet entries for the currently logged-in user
        $emp_id = Auth::user()->emp_id;
        $timeSheetEntries = TimeSheetEntry::where('emp_id', $emp_id)->get();
 
        return view('livewire.time-sheet-display', compact('timeSheetEntries'));
    }
    public function storeSchedule()
    {
        $emp_id = Auth::user()->emp_id;
 
        foreach ($this->hours as $day => $hours) {
            // Convert day to lowercase
            $day = strtolower($day);
       
            // Insert or update the TimeSheet entry for each day
            TimeSheetEntry::updateOrCreate(
                [
                    'emp_id' => $emp_id,
                   
                ],
                [
                    'hours' => $hours['regular'],  // Assuming you are storing 'regular' hours
                    // Add other fields as needed
                ]
            );
        }
 
        session()->flash('success', 'Working hours updated successfully');
    }
}

 
