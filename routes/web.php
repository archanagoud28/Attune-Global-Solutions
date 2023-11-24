<?php


use App\Livewire\ContractorPage;

use App\Livewire\Customers;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Home;
use App\Livewire\HrLogin;
use App\Livewire\EmpRegister;
use App\Livewire\EmpAccountDetails;
use App\Livewire\EmpFamilyDetails;
use App\Livewire\EmployeePage;
use App\Livewire\HomePage;

use App\Livewire\VendorPage;

use App\Livewire\PurchaseOrder;
use App\Livewire\SalesOrPurchaseOrders;
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


Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        // Get the currently authenticated user
        $user = Auth::user();

        // Check if a user is authenticated
        if ($user) {
            // Get the role of the user
            $role = $user->role;

            // Redirect based on the user's role
            switch ($role) {
                case 'hr':
                    return redirect()->route('home-page');
                    break;
                case 'vendor':
                    return redirect()->route('vendor-page');
                    break;
                case 'customer':
                    return redirect()->route('customer-page');
                    break;
                case 'employee':
                    return redirect()->route('employee-page');
                    break;
                case 'contractor':
                    return redirect()->route('contractor-page');
                    break;
                default:
                    // Handle other roles or unauthorized access
                    abort(403, 'Unauthorized');
            }
        } else {
            // User is not authenticated, handle accordingly
            return redirect()->route('hr-login');
        }
    });
});

Route::middleware(['auth:hr'])->group(function () {
    Route::get('/', HomePage::class)->name('home-page');
    Route::get('/emp-register', EmpRegister::class)->name('emp-register');
    Route::get('/emp-account-details', EmpAccountDetails::class)->name('emp-account-details');
    Route::get('/emp-family-details', EmpFamilyDetails::class)->name('emp-family-details');
    Route::get('/employee-page', EmployeePage::class)->name('employee-page');
    Route::get('/contractor-page', ContractorPage::class)->name('contractor-page');
    Route::get('/vendor-page', VendorPage::class)->name('vendor-page');
    Route::get('/vendor-register', VendorRegister::class)->name('vendor-register');
    Route::get('/customers', Customers::class)->name('customer-page');
    Route::get('/sales-or-purchase-orders', SalesOrPurchaseOrders::class);
    Route::get('/time-sheet-display', TimeSheetDisplay::class)->name('time-sheet-display');
    Route::get('/purchase-order', PurchaseOrder::class)->name('purchase-order');
});

Route::middleware(['auth:vendor'])->group(function () {
    Route::get('/vendor-page', VendorPage::class)->name('vendor-page');
    Route::get('/vendor-register', VendorRegister::class)->name('vendor-register');
});

Route::middleware(['auth:customer'])->group(function () {

    Route::get('/customers', Customers::class)->name('customer-page');
});

Route::middleware(['auth:employee'])->group(function () {

    Route::get('/employee-page', EmployeePage::class)->name('employee-page');

});

Route::middleware(['auth:contractor'])->group(function () {

    Route::get('/contractor-page', ContractorPage::class)->name('contractor-page');

});
