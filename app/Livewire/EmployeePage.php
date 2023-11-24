<?php

namespace App\Livewire;

use App\Models\EmpDetails;
use Livewire\Component;
use Livewire\WithPagination;

class EmployeePage extends Component
{
    use WithPagination;
    public $viewMode;
    public function toggleView()
    {
        $this->viewMode = ($this->viewMode === 'table') ? 'grid' : 'table';
    }
    public function render()
    {
        $employees = EmpDetails::with('company')->orderBy('created_at', 'desc')->paginate(8);
      
        return view('livewire.employee-page', ['employees' => $employees]);
    }
}
