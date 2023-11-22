<?php

namespace App\Livewire;

use App\Models\CompanyDetails;
use App\Models\CustomerDetails;
use Livewire\Component;
use Livewire\WithFileUploads;

class Customers extends Component
{
    use WithFileUploads;
    public $customers, $selected_customer;
    public $company_name;
    public $show = false;

    public  $customer_profile, $company_id, $customer_name, $email, $phone, $address, $notes, $customer_company_name;

    public function open()
    {
        $this->show = true;
    }

    public function close()
    {
        $this->show = false;
    }
    public function addCustomers()
    {
        $this->validate([
            'customer_profile' => 'required',
            'company_id' => 'required',
            'customer_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'notes' => 'required',
            'customer_company_name' => 'required'
        ]);
        $customerProfilePath = $this->customer_profile->store('customer_profiles', 'public');
        CustomerDetails::create([
            'customer_profile' => $customerProfilePath,
            'company_id' => $this->company_id,
            'customer_name' => $this->customer_name,
            'customer_company_name' => $this->customer_company_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'notes' => $this->notes,
        ]);
        session()->flash('success', 'Customer added successfully.');
        $this->show = false;
    }
    public $edit = false;

    public $selectedCustomerId;
    public function editCustomers($customerId)
    {
        $this->selectedCustomerId = $customerId;

        $this->edit = true;
        $this->selected_customer = CustomerDetails::find($customerId);

        // Assign values to Livewire properties
        $this->customer_profile = $this->selected_customer->customer_profile;
        $this->company_id = $this->selected_customer->company_id;
        $this->customer_name = $this->selected_customer->customer_name;
        $this->customer_company_name = $this->selected_customer->customer_company_name;
        $this->email = $this->selected_customer->email;
        $this->phone = $this->selected_customer->phone;
        $this->address = $this->selected_customer->address;
        $this->notes = $this->selected_customer->notes;
    }
    public function closeEdit(){
        $this->edit = false;
    }

    public function updateCustomers()
    {
        $this->validate([
            'customer_profile' => 'required',
            'company_id' => 'required',
            'customer_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'notes' => 'required',
            'customer_company_name' => 'required'
        ]);
        // Find the customer by ID
        $customer = CustomerDetails::find($this->selectedCustomerId);

        // Check if a new customer profile image is provided
        if ($this->customer_profile) {
            // Store the new customer profile image and update the path
            $customerProfilePath = $this->customer_profile->store('customer_profiles', 'public');
            $customer->update(['customer_profile' => $customerProfilePath]);
        }

        // Update other fields
        $customer->update([
            'company_id' => $this->company_id,
            'customer_name' => $this->customer_name,
            'customer_company_name' => $this->customer_company_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'notes' => $this->notes,
        ]);

        // Reset the Livewire properties and set edit mode to false
        $this->reset();
        $this->edit = false;
    }

    public $viewMode;
    public function toggleView()
    {
        $this->viewMode = ($this->viewMode === 'table') ? 'grid' : 'table';
    }
    public $companies;
    public function render()
    {
        $this->companies = CompanyDetails::all();
        $this->customers = CustomerDetails::with('company')->orderBy('created_at', 'desc')->get();

        return view('livewire.customers');
    }
}
