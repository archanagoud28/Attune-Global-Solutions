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
    public $show = false;

    public  $image, $company_id, $customer_name, $email, $phone, $address, $notes, $customer_company_name;

    public $selectedCustomer;
    public function selectCustomer($customerId)
    {
        $this->selectedCustomer = EmpDetails::where('emp_id', $customerId)->first();
      
    }

    public $filteredPeoples;
    public $peopleFound;

    public $searchTerm;
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


    public function open()
    {
        $this->show = true;
    }

    public function close()
    {
        $this->show = false;
    }
    
    public $edit = false;

    public $selectedCustomerId;
    public function editCustomers($customerId)
    {
        $this->selectedCustomerId = $customerId;

        $this->edit = true;
        $this->selected_customer = EmpDetails::find($customerId);

        // Assign values to Livewire properties
        $this->image = $this->selected_customer->image;
        $this->email = $this->selected_customer->email;
        $this->mobile_number = $this->selected_customer->mobile_number;
        $this->address = $this->selected_customer->address;
    }
    public function closeEdit()
    {
        $this->edit = false;
    }

    public function updateCustomers()
    {
        $this->validate([
            'email' => 'required',
            'mobile_number' => 'required',
            'address' => 'required',
            'image' => 'required'
        ]);
        $customer = EmpDetails::find($this->selectedCustomerId);

        if ($this->image instanceof \Illuminate\Http\UploadedFile) {
            $customerProfilePath = $this->image->store('employee_image', 'public');
            $customer->update(['image' => $customerProfilePath]);
        }


        $customer->update([
          
            'email' => $this->email,
            'mobile_number' => $this->mobile_number,
            'address' => $this->address,
            'image' => $customerProfilePath,
        ]);

        // Reset the Livewire properties and set edit mode to false
        $this->reset();
        $this->edit = false;
    }
    public function updateStatus($customerId)
    {
        $customer = EmpDetails::find($customerId);

        $customer->status = $customer->status == 'active' ? 'inactive' : 'active';
        $customer->save();
    }

    public $allCustomers;
    public $companies;
    public function render()
    {
        $this->customers = EmpDetails::all();
        $this->allCustomers = $this->filteredPeoples ?: $this->customers;
        return view('livewire.employee-list-page');
    }
}
