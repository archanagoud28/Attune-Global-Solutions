<?php

namespace App\Livewire;

use App\Models\CompanyDetails;
use App\Models\CustomerDetails;
use Livewire\Component;
use Livewire\WithFileUploads;

class Customers extends Component
{
    use WithFileUploads;
    public $customers;
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

    public function editCustomers($customerId){
        $this->companies= CustomerDetails::where('customer_id', $customerId)->first();
        $this->customer_profile=$this->companies->customer_profile;
        $this->company_id=$this->companies->customer_id;
        $this->customer_name=$this->companies->customer_name;
        $this->customer_company_name=$this->companies->customer_company_name;
        $this->email=$this->companies->email;
        $this->phone=$this->companies->phone;
        $this->address=$this->companies->address;
        $this->notes=$this->companies->notes;
        dd($this->notes);
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
