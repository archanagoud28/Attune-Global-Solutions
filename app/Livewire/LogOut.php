<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LogOut extends Component
{
    public function logouted()
    {
        if(auth('hr')->loginUsingId(auth('hr')->user()->id)){
            auth('hr')->logout();
        }
        else if(auth('vendor')->loginUsingId(auth('vendor')->user()->id)){
            auth('vendor')->logout();
        }
        else if(auth('customer')->loginUsingId(auth('customer')->user()->id)){
            auth('customer')->logout();
        }
        else if(auth('employee')->loginUsingId(auth('employee')->user()->id)){
            auth('employee')->logout();
        }
        else if(auth('contractor')->loginUsingId(auth('contractor')->user()->id)){
            auth('contractor')->logout();
        }

    }

    public function render()
    {
        return view('livewire.log-out');
    }
}
