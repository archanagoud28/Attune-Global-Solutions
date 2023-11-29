<?php

namespace App\Livewire;
use App\Models\CompanyDetails;
use App\Models\EmpDetails;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class EmployeeListPage extends Component
{
    use WithFileUploads;
    public $customers, $selected_customer;
    public $company_name;
    public $selectedCustomer;
    public $filteredPeoples;
    public $peopleFound;
    public $edit = false;
    public $searchTerm;
    public $allCustomers;
    public $companies;

    public function selectCustomer($customerId)
    {
        $this->selectedCustomer = EmpDetails::where('emp_id', $customerId)->first();
      
    }

    public function filter()
    {
        // Trim the search term to remove leading and trailing spaces
        $trimmedSearchTerm = trim($this->searchTerm);

        // Use Eloquent to filter records based on the search term
        $companyId = Auth::user()->company_id;
        $this->filteredPeoples = EmpDetails::where('employee_type', '!=', 'contract')->where('company_id', $companyId)->orderByDesc('created_at')->where(function ($query) use ($trimmedSearchTerm) {
            $query->where('first_name', 'LIKE', '%' . $trimmedSearchTerm . '%')
                ->orWhere('last_name', 'LIKE', '%' . $trimmedSearchTerm . '%')
                ->orWhere('emp_id', 'LIKE', '%' . $trimmedSearchTerm . '%');
        })
            ->get();

        // Check if any records were found
        $this->peopleFound = count($this->filteredPeoples) > 0;
    }
   
    public function editCustomers()
    {
        $this->edit = true;
    }
    public function closeEdit()
    {
        $this->edit = false;
    }
    public function render()
    {
        $companyId = Auth::user()->company_id;
        $this->customers = EmpDetails::where('employee_type', '!=', 'contract')->where('company_id', $companyId)->orderByDesc('created_at')->get();
      
        $this->allCustomers = $this->filteredPeoples ?: $this->customers;
        return view('livewire.employee-list-page');
    }
}
