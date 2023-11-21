<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\EmpDetails;
use Illuminate\Support\Facades\Hash;
class EmpRegister extends Component
{
    use WithFileUploads;

    public $emp_id;
    public $first_name;

    public function register(){
        $this->validate([
            'emp_id' => 'required|unique:emp_details',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:Male,Female',
            'email' => 'required|email|unique:emp_details',
            'company_name' => 'required|string|max:255',
            'company_email' => 'required|email|unique:emp_details',
            'mobile_number' => 'required|string|max:15',
            'alternate_mobile_number' => 'nullable|string|max:15',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'postal_code' => 'required|string|max:20',
            'country' => 'required|string|max:255',
            'hire_date' => 'required|date',
            'employee_type' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            // ... (other validations for remaining fields)
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Example validation for image upload
        ]);

         // Save the details to the database
         EmpDetails::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'date_of_birth' => $this->date_of_birth,
            'gender' => $this->gender,
            'email' => $this->email,
            'company_name' => $this->company_name,
            'company_email' => $this->company_email,
            'mobile_number' => $this->mobile_number,
            'alternate_mobile_number' => $this->alternate_mobile_number,
            'address' => $this->address,
            'city' => $this->city,
            'state' => $this->state,
            'postal_code' => $this->postal_code,
            'country' => $this->country,
            'hire_date' => $this->hire_date,
            'employee_type' => $this->employee_type,
            'department' => $this->department,
            'job_title' => $this->job_title,
            // ... (other fields)
            'image' => $this->image->store('images', 'public'), // Example storage for image upload
        ]);


        session()->flash('emp_success', 'Employee registered successfully!');

        // Clear the form fields
        $this->reset();

    }
    public function render()
    {
        return view('livewire.emp-register');
    }
}
