<?php

use App\Livewire\Home;
use App\Livewire\HrLogin;
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

Route::get('/HrLogin', HrLogin::class)->name('hr-login');
Route::middleware(['auth:hr'])->group(function () {
    Route::get('/', Home::class);
});
