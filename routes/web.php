
<?php

use App\Livewire\Bills;
use App\Livewire\BillsOrInvoices as LivewireBillsOrInvoices;
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
use App\Livewire\EmployeeListPage;
use App\Livewire\Invoices;
use App\Livewire\PurchaseOrder;
use App\Livewire\SalesOrPurchaseOrders;
use App\Livewire\TimeSheetDisplay;
use App\Livewire\VendorRegister;
use App\Livewire\Vendors;
use App\Livewire\PageTitle;
use App\Models\BillsorInvoices;
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


// Route::middleware(['auth'])->group(function () {
//     Route::get('/', function () {
//         // Get the currently authenticated user
//         $user = Auth::user();

//         // Check if a user is authenticated
//         if ($user) {
//             // Get the role of the user
//             $role = $user->role;

//             // Redirect based on the user's role
//             switch ($role) {
//                 case 'hr':
//                     return redirect()->route('home-page');
//                     break;
//                 case 'vendor':
//                     return redirect()->route('vendor-page');
//                     break;
//                 case 'customer':
//                     return redirect()->route('customer-page');
//                     break;
//                 case 'employee':
//                     return redirect()->route('employee-page');
//                     break;
//                 case 'contractor':
//                     return redirect()->route('contractor-page');
//                     break;
//                 default:
//                     // Handle other roles or unauthorized access
//                     abort(403, 'Unauthorized');
//             }
//         } else {
//             // User is not authenticated, handle accordingly
//             return redirect()->route('hr-login');
//         }
//     });
// });

Route::middleware(['auth:hr'])->group(function () {
    Route::get('/', HomePage::class)->name('home-page');
    Route::get('/emp-register', EmpRegister::class)->name('emp-register');
    Route::get('/emp-account-details', EmpAccountDetails::class)->name('emp-account-details');
    Route::get('/emp-family-details', EmpFamilyDetails::class)->name('emp-family-details');
    Route::get('/employee-page', EmployeePage::class)->name('employee-page');
    Route::get('/contractor-page', ContractorPage::class)->name('contractor-page');
    Route::get('/vendor-page', Vendors::class)->name('vendor-page');
    Route::get('/customers', Customers::class)->name('customer-page');
    Route::get('/salesOrPurchase', SalesOrPurchaseOrders::class)->name('salesOrPurchase');
    Route::get('/billsOrInvoices', \App\Livewire\BillsOrInvoices::class)->name('billsOrInvoices');
    Route::get('/time-sheet-display', TimeSheetDisplay::class)->name('time-sheet-display');
    Route::get('/purchase-order', PurchaseOrder::class)->name('purchase-order');
    Route::get('/employee-list-page', EmployeeListPage::class)->name('employee-list-page');
});

Route::middleware(['auth:vendor'])->group(function () {
    Route::get('/vendor-home', HomePage::class)->name('vendor-home');
    Route::get('/vendor-pages', Vendors::class)->name('vendor-pages');
});

Route::middleware(['auth:customer'])->group(function () {
    Route::get('/customer-home', HomePage::class)->name('customer-home');
    Route::get('/customer-pages', Customers::class)->name('customer-pages');
});

Route::middleware(['auth:employee'])->group(function () {
    Route::get('/employee-home', HomePage::class)->name('employee-home');
    Route::get('/employee-pages', EmployeePage::class)->name('employee-pages');
    Route::get('/time-sheets-display', TimeSheetDisplay::class)->name('time-sheets-display');
});

Route::middleware(['auth:contractor'])->group(function () {
    Route::get('/contractor-home', HomePage::class)->name('contractor-home');
    Route::get('/contractor-pages', ContractorPage::class)->name('contractor-pages');
});
Route::get('/page-title', PageTitle::class)->name('page-title');