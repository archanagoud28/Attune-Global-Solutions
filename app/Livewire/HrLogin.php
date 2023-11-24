<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HrLogin extends Component
{
    public $error = '';
    public $form = [
        'hr_id' => '',
        'password' => '',
    ];
    public function empLogin()
    {
        $this->validate([
            "form.hr_id" => 'required',
            "form.password" => "required"
        ]);


        if (Auth::guard('hr')->attempt(['email' => $this->form['hr_id'], 'password' => $this->form['password']]) ||
        Auth::guard('hr')->attempt(['hr_id' => $this->form['hr_id'], 'password' => $this->form['password']]))  {
            // if (Auth::guard('hr')->attempt($this->form)) {
            $hrId = Auth::guard('hr')->user()->hr_id;
            $mailId = Auth::guard('hr')->user()->email;
            Session::put('hr_id', $hrId);
            Session::put('hr_email', $mailId);
            Session::put('lastActivityTime', now());
            session()->flash('Success', 'You are logged in successfully!');
            return redirect('/');
        }else if (Auth::guard('employee')->attempt(['email' => $this->form['hr_id'], 'password' => $this->form['password']]) ||
        Auth::guard('employee')->attempt(['emp_id' => $this->form['hr_id'], 'password' => $this->form['password']]))  {
            // if (Auth::guard('hr')->attempt($this->form)) {
            $hrId = Auth::guard('employee')->user()->emp_id;
            $mailId = Auth::guard('employee')->user()->email;
            Session::put('hr_id', $hrId);
            Session::put('hr_email', $mailId);
            Session::put('lastActivityTime', now());
            session()->flash('Success', 'You are logged in successfully!');
            return redirect('/employee-page');
        }
        else if (Auth::guard('customer')->attempt(['email' => $this->form['hr_id'], 'password' => $this->form['password']]) ||
        Auth::guard('customer')->attempt(['customer_id' => $this->form['hr_id'], 'password' => $this->form['password']]))  {
            // if (Auth::guard('hr')->attempt($this->form)) {
            $hrId = Auth::guard('customer')->user()->customer_id;
            $mailId = Auth::guard('customer')->user()->email;
            Session::put('hr_id', $hrId);
            Session::put('hr_email', $mailId);
            Session::put('lastActivityTime', now());
            session()->flash('Success', 'You are logged in successfully!');
            return redirect('/customers');
        }
        else if (Auth::guard('vendor')->attempt(['email' => $this->form['hr_id'], 'password' => $this->form['password']]) ||
        Auth::guard('vendor')->attempt(['vendor_id' => $this->form['hr_id'], 'password' => $this->form['password']]))  {
            // if (Auth::guard('hr')->attempt($this->form)) {
            $hrId = Auth::guard('vendor')->user()->vendor_id;
            $mailId = Auth::guard('vendor')->user()->email;
            Session::put('hr_id', $hrId);
            Session::put('hr_email', $mailId);
            Session::put('lastActivityTime', now());
            session()->flash('Success', 'You are logged in successfully!');
            return redirect('/vendor-page');
        }
        else if (Auth::guard('contractor')->attempt(['contractor_email' => $this->form['hr_id'], 'password' => $this->form['password']]) ||
        Auth::guard('contractor')->attempt(['contractor_id' => $this->form['hr_id'], 'password' => $this->form['password']]))  {
            // if (Auth::guard('hr')->attempt($this->form)) {
            $hrId = Auth::guard('contractor')->user()->contractor_id;
            $mailId = Auth::guard('contractor')->user()->contractor_email;
            Session::put('hr_id', $hrId);
            Session::put('hr_email', $mailId);
            Session::put('lastActivityTime', now());
            session()->flash('Success', 'You are logged in successfully!');
            return redirect('/contractor-page');
        }
        else {
            $this->error = "ID/Email or Password Wrong!!";
        }
    }


    public function render()
    {
        return view('livewire.hr-login');
    }
}
