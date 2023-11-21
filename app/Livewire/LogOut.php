<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LogOut extends Component
{
    public function logouted()
    {
        auth('hr')->loginUsingId(auth('hr')->user()->id);
        auth('hr')->logout();
    }

    public function render()
    {
        return view('livewire.log-out');
    }
}
