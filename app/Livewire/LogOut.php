<?php

namespace App\Livewire;

use Livewire\Component;

class LogOut extends Component
{
    public function logouted(){
       return redirect('/HrLogin');
    }
    public function render()
    {
        return view('livewire.log-out');
    }
}
