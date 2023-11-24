<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CompanyDetails;
use App\Models\EmpDetails;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class ContractorPage extends Component
{
    use WithFileUploads;
    public $contractors;
    public $company_name;
    public $selectedContractor;
    public $filteredPeoples;
    public $peopleFound;
    public $edit = false;
    public $searchTerm;
    public $allContractors;
    public $companies;

    public function selectContractor($contractorId)
    {
        $this->selectedContractor = EmpDetails::where('emp_id', $contractorId)->first();
      
    }

    public function filter()
    {
        // Trim the search term to remove leading and trailing spaces
        $trimmedSearchTerm = trim($this->searchTerm);

        // Use Eloquent to filter records based on the search term
        $this->filteredPeoples = EmpDetails::where(function ($query) use ($trimmedSearchTerm) {
            $query->where('first_name', 'LIKE', '%' . $trimmedSearchTerm . '%')
                ->orWhere('last_name', 'LIKE', '%' . $trimmedSearchTerm . '%')
                ->orWhere('emp_id', 'LIKE', '%' . $trimmedSearchTerm . '%');
        })
            ->get();

        // Check if any records were found
        $this->peopleFound = count($this->filteredPeoples) > 0;
    }
   
    public function editcontractors()
    {
        $this->edit = true;
    }
    public function closeEdit()
    {
        $this->edit = false;
    }
    public function render()
    {
        $this->contractors = EmpDetails::where('employee_type', '=', 'contract')->orderByDesc('created_at')->get();
        $this->allContractors = $this->filteredPeoples ?: $this->contractors;
        return view('livewire.contractor-page');
    }
}
