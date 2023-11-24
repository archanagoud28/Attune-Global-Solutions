<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\QueryException;
use Illuminate\Auth\AuthenticationException;
class HrLogin extends Component
{
    public $error = '';
    public $form = [
        'id' => '',
        'password' => '',
    ];
    protected $messages = [
        'form.id.required' => 'ID/Email is required.',
        'form.password.required' => 'Password is required.',
    ];
    public function empLogin()
    {
         try {

            $this->validate([
                "form.id" => 'required',
                "form.password" => "required"
            ]);

            //dd($this->form['password']);

        if (Auth::guard('hr')->attempt(['email' => $this->form['id'], 'password' => $this->form['password']]) ||
        Auth::guard('hr')->attempt(['hr_id' => $this->form['id'], 'password' => $this->form['password']]))  {
            // if (Auth::guard('hr')->attempt($this->form)) {
            $hrId = Auth::guard('hr')->user()->hr_id;
            $mailId = Auth::guard('hr')->user()->email;
            Session::put('hr_id', $hrId);
            Session::put('email', $mailId);
            Session::put('lastActivityTime', now());
            session()->flash('Success', 'You are logged in successfully!');
            return redirect('/');
        }else if (Auth::guard('employee')->attempt(['email' => $this->form['id'], 'password' => $this->form['password']]) ||
        Auth::guard('employee')->attempt(['emp_id' => $this->form['id'], 'password' => $this->form['password']]))  {
            // if (Auth::guard('hr')->attempt($this->form)) {
            $hrId = Auth::guard('employee')->user()->emp_id;
            $mailId = Auth::guard('employee')->user()->email;
            Session::put('emp_id', $hrId);
            Session::put('email', $mailId);
            Session::put('lastActivityTime', now());
            session()->flash('Success', 'You are logged in successfully!');
            return redirect('/employee-page');
        }
        else if (Auth::guard('customer')->attempt(['email' => $this->form['id'], 'password' => $this->form['password']]) ||
        Auth::guard('customer')->attempt(['customer_id' => $this->form['id'], 'password' => $this->form['password']]))  {
            // if (Auth::guard('hr')->attempt($this->form)) {
            $hrId = Auth::guard('customer')->user()->customer_id;
            $mailId = Auth::guard('customer')->user()->email;
            Session::put('customer_id', $hrId);
            Session::put('email', $mailId);
            Session::put('lastActivityTime', now());
            session()->flash('Success', 'You are logged in successfully!');
            return redirect('/customers');
        }
        else if (Auth::guard('vendor')->attempt(['email' => $this->form['id'], 'password' => $this->form['password']]) ||
        Auth::guard('vendor')->attempt(['vendor_id' => $this->form['id'], 'password' => $this->form['password']]))  {
            // if (Auth::guard('hr')->attempt($this->form)) {
            $hrId = Auth::guard('vendor')->user()->vendor_id;
            $mailId = Auth::guard('vendor')->user()->email;
            Session::put('vendor_id', $hrId);
            Session::put('email', $mailId);
            Session::put('lastActivityTime', now());
            session()->flash('Success', 'You are logged in successfully!');
            return redirect('/vendor-page');
        }
        else if (Auth::guard('contractor')->attempt(['contractor_email' => $this->form['id'], 'password' => $this->form['password']]) ||
        Auth::guard('contractor')->attempt(['contractor_id' => $this->form['id'], 'password' => $this->form['password']]))  {
            // if (Auth::guard('hr')->attempt($this->form)) {
            $hrId = Auth::guard('contractor')->user()->contractor_id;
            $mailId = Auth::guard('contractor')->user()->contractor_email;
            Session::put('contractor_id', $hrId);
            Session::put('contractor_email', $mailId);
            Session::put('lastActivityTime', now());
            session()->flash('Success', 'You are logged in successfully!');
            return redirect('/contractor-page');
        }
        else {
            $this->error = "ID/Email or Password Wrong!!";
        }
        }catch (AuthenticationException $e) {
            $this->error = $this->mapAuthenticationError($e->getMessage());
            session()->flash('error', $this->error);
        } catch (QueryException $e) {
            $this->error = $this->mapDatabaseConnectionError($e->getMessage());
            session()->flash('error', $this->error);
        } catch (\Exception $e) {
            $this->error = "An error occurred: " . $e->getMessage();
            session()->flash('error', $this->error);
        }

        return redirect()->back();
    }

        // Map database connection errors to user-friendly messages
        private function mapDatabaseConnectionError($errorMessage)
        {
            if (strpos($errorMessage, 'SQLSTATE[HY000] [1045] Access denied for user') !== false) {
                return "Database connection error: Invalid database credentials";
            }

            // Add more cases if needed...

            return "Database connection error";
        }



        private function mapAuthenticationError($errorMessage)
        {
            if (strpos($errorMessage, 'These credentials do not match our records') !== false) {
                return "Invalid ID/Email or Password";
            }

            // Add more cases if needed...

            return "Authentication failed";
        }



    public function render()
    {
        //dd($this->error);
        return view('livewire.hr-login');
    }
}
