<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LogOut extends Component
{
    public function logouted()
    {
        Auth::logout();
        return redirect('/HrLogin');
    }

    public function render()
    {
        return view('livewire.log-out');
    }
}
