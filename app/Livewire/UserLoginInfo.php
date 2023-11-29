<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class UserLoginInfo extends Component
{
    public $userRole;

    public function mount()
    {
        // Determine user role and set it to $userRole
        if (Auth::guard('hr')->check()) {
            $this->userRole = 'HR';
        } elseif (Auth::guard('vendor')->check()) {
            $this->userRole = 'Vendor';
        } elseif (Auth::guard('customer')->check()) {
            $this->userRole = 'Customer';
        } elseif (Auth::guard('contractor')->check()) {
            $this->userRole = 'Contractor';
        } elseif (Auth::guard('employee')->check()) {
            $this->userRole = 'Employee';
        }
    }
    public function render()
    {
        return view('livewire.user-login-info');
    }
}
