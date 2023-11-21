<?php

namespace App\Livewire;

use App\Models\CustomerDetails;
use Livewire\Component;
use Livewire\WithFileUploads;

class Customers extends Component
{
    use WithFileUploads;
    public $customers;
    public $show = false;

    public  $customer_profile, $company_id, $customer_name, $email, $phone, $address, $notes;

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
        ]);
        $customerProfilePath = $this->customer_profile->store('customer_profiles', 'public');
        CustomerDetails::create([
            'customer_profile' => $customerProfilePath,
            'company_id' => $this->company_id,
            'customer_name' => $this->customer_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'notes' => $this->notes,
        ]);
        session()->flash('success', 'Customer added successfully.');
        $this->show = false;

    }
    public function render()
    {
        $this->customers = CustomerDetails::orderBy('created_at', 'desc')->get();

        return view('livewire.customers');
    }
}
