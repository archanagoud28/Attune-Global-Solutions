<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HrLogin extends Component
{
    public $error = '';
    public $form = [
        'email' => '',
        'password' => '',
    ];
    public function empLogin()
    {
        $this->validate([
            "form.email" => 'required',
            "form.password" => "required"
        ]);
        if (Auth::guard('hr')->attempt($this->form)) {
            $mailId = Auth::guard('hr')->user()->email;

            Session::put('email', $mailId);
            Session::put('lastActivityTime', now());
            session()->flash('Success', 'You are logged in successfully!');
            return redirect('/');
        } else {
            $this->error = "HR Mail or Password Wrong!!";
        }
    }


    public function render()
    {
        return view('livewire.hr-login');
    }
}
