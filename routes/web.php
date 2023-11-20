<?php

use App\Livewire\Home;
use App\Livewire\EmpRegister;
use App\Livewire\EmpAccountDetails;
use App\Livewire\EmpFamilyDetails;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', Home::class);

Route::get('/emp-register', EmpRegister::class)->name('emp-register');
Route::get('/emp-account-details', EmpAccountDetails::class)->name('emp-account-details');
Route::get('/emp-family-details', EmpFamilyDetails::class)->name('emp-family-details');