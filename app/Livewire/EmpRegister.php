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
    public $last_name;
    public $date_of_birth;
    public $gender;
    public $email;
    public $company_name;
    public $company_email;
    public $mobile_number;
    public $alternate_mobile_number;
    public $address;
    public $city;
    public $state;
    public $postal_code;
    public $country;
    public $hire_date;
    public $employee_type;
    public $department;
    public $job_title;
    public $manager_id;
    public $report_to;
    public $employee_status;
    public $emergency_contact;
    public $password;
    public $image;
    public $blood_group;
    public $nationality;
    public $religion;
    public $marital_status;
    public $spouse;
    public $physically_challenge;
    public $inter_emp;
    public $job_location;
    public $education;
    public $experience;
    public $pan_no;
    public $aadhar_no;
    public $pf_no;
    public $nick_name;
    public $time_zone;
    public $biography;
    public $facebook;
    public $twitter;
    public $linked_in;
    public $company_id;
    public $is_starred;
    public $skill_set;

    
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
            'manager_id' => 'required|string|max:255',
            'report_to' => 'required|string|max:255',
            'company_id' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

        if ($this->image) {
            // Check if an image is set
            $imagePath = $this->image->store('images', 'public');
        } else {
            $imagePath = null;
        }
         
         EmpDetails::create([
           
            'emp_id' => $this->emp_id,
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
            'manager_id' => $this->manager_id,
            'report_to' => $this->report_to,
            'department' => $this->department,
            'job_title' => $this->job_title,
            'employee_status' => $this->employee_status,
            'emergency_contact' => $this->emergency_contact,
            'password' => $this->password,
            'image' => $imagePath, // Example storage for image upload
            'blood_group' => $this->blood_group,
            'nationality' => $this->nationality,
            'religion' => $this->religion,
            'marital_status' => $this->marital_status,
            'spouse' => $this->spouse,
            'physically_challenge' => $this->physically_challenge,
            'inter_emp' => $this->inter_emp,
            'job_location' => $this->job_location,
            'education' => $this->education,
            'experience' => $this->experience,
            'pan_no' => $this->pan_no,
            'aadhar_no' => $this->aadhar_no,
            'pf_no' => $this->pf_no,
            'nick_name' => $this->nick_name,
            'time_zone' => $this->time_zone,
            'biography' => $this->biography,
            'facebook' => $this->facebook,
            'twitter' => $this->twitter,
            'linked_in' => $this->linked_in,
            'company_id' => $this->company_id,
            'is_starred' => $this->is_starred,
            'skill_set' => $this->skill_set,
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
