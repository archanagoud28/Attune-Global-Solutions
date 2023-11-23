<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\EmpDetails;

class EmployeeListPage extends Component
{
    public $employees;
    public $selectedEmployee;
    public $search = '';

    public function mount()
    {
        // Fetch all employees for the left side list
        $this->employees = EmpDetails::all();
   
        $this->selectedPerson = $this->employees->first();
       
    }

    public function render()
    {
        // Use the filteredEmployees method to get the filtered list based on search
        return view('livewire.employee-list-page', [
            'employees' => $this->employees,
            'selectedPerson' =>  $this->selectedPerson,
            'filteredEmployees' => $this->filteredEmployees(),
        ]);
    }

    public function selectEmployee($employeeId)
    {
              
    }
    
    public function filteredEmployees()
    {
        // Filter employees based on search input if not empty, otherwise return all employees
        if (!empty($this->search)) {
            return EmpDetails::where('first_name', 'like', '%' . $this->search . '%')
                ->orWhere('last_name', 'like', '%' . $this->search . '%')
                ->orWhere('id', 'like', '%' . $this->search . '%')
                ->get();
        }
        return $this->employees;
    }
    
    
    // Livewire magic method for updating properties with debounce
    public function updatedSearch()
    {
        
    }
}
