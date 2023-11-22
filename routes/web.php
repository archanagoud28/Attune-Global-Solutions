<?php


use App\Livewire\ContractorPage;

use App\Livewire\Customers;

use App\Livewire\Home;
use App\Livewire\HrLogin;
use App\Livewire\EmpRegister;
use App\Livewire\EmpAccountDetails;
use App\Livewire\EmpFamilyDetails;
use App\Livewire\EmployeePage;
use App\Livewire\HomePage;

use App\Livewire\VendorPage;

use App\Livewire\PurchaseOrder;
use App\Livewire\TimeSheetDisplay;
use App\Livewire\VendorRegister;
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

Route::middleware(['checkAuth'])->group(function () {
    Route::get('/HrLogin', HrLogin::class)->name('hr-login');
});
Route::middleware(['auth:hr'])->group(function () {
    Route::get('/', Home::class);
<<<<<<< HEAD
    Route::get('/emp-register', EmpRegister::class)->name('emp-register');
    Route::get('/emp-account-details', EmpAccountDetails::class)->name('emp-account-details');
    Route::get('/emp-family-details', EmpFamilyDetails::class)->name('emp-family-details');
    Route::get('/employee-page', EmployeePage::class)->name('employee-page');
    Route::get('/home-page', HomePage::class)->name('home-page');
    Route::get('/contractor-page', ContractorPage::class)->name('contractor-page');
    Route::get('/vendor-page', VendorPage::class)->name('vendor-page');
=======
Route::get('/emp-register', EmpRegister::class)->name('emp-register');
Route::get('/emp-account-details', EmpAccountDetails::class)->name('emp-account-details');
Route::get('/emp-family-details', EmpFamilyDetails::class)->name('emp-family-details');
Route::get('/employee-page', EmployeePage::class)->name('employee-page');
Route::get('/home-page', HomePage::class)->name('home-page');
Route::get('/contractor-page', ContractorPage::class)->name('contractor-page');
Route::get('/vendor-page', VendorPage::class)->name('vendor-page');
Route::get('/vendor-register', VendorRegister::class)->name('vendor-register');
>>>>>>> feb9ebf17f1553ac9a6994454c95a58e632bdb54
    Route::get('/customers', Customers::class);
    Route::get('/emp-register', EmpRegister::class)->name('emp-register');
    Route::get('/emp-account-details', EmpAccountDetails::class)->name('emp-account-details');
    Route::get('/emp-family-details', EmpFamilyDetails::class)->name('emp-family-details');
    Route::get('/emp-register', EmpRegister::class)->name('emp-register');
    Route::get('/emp-account-details', EmpAccountDetails::class)->name('emp-account-details');
    Route::get('/emp-family-details', EmpFamilyDetails::class)->name('emp-family-details');
    Route::get('/employee-page', EmployeePage::class)->name('employee-page');
    Route::get('/', HomePage::class)->name('home-page');
    Route::get('/emp-register', EmpRegister::class)->name('emp-register');
    Route::get('/emp-account-details', EmpAccountDetails::class)->name('emp-account-details');
    Route::get('/emp-family-details', EmpFamilyDetails::class)->name('emp-family-details');
    Route::get('/employee-page', EmployeePage::class)->name('employee-page');
    Route::get('/time-sheet-display', TimeSheetDisplay::class)->name('time-sheet-display');
    Route::get('/purchase-order', PurchaseOrder::class)->name('purchase-order');
});
