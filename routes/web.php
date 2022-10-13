<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SearchController;
use App\Http\Controllers\HomeController;
use App\Mail\Welcome;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/group', function () {
    return view('web.group');
});

Route::get('/corp', function () {
    return view('web.corp');
});

Route::get('/bus', function () {
    return view('web.bus');
});

Route::get('/transfer', function () {
    return view('transfer');
});

Route::get('/china', function () {
    return view('web.china');
});

Route::get('/mcenter', function () {
    return view('web.mcenter');
});

Route::get('/career', function () {
    return view('web.career');
});

// Route::get('/career', function () {
//     return view('career');
// });


Route::get('/email', function () {

    //return view('welcome');
    //Mail::to('info@bhlworld.space')->send(new Welcome());
    // return new Welcome();
});

// Route::get('/printsearch', function () {
//     return view('printsearch');
// });

Route::get('/search', [SearchController::class, 'search'])->name('web.search');
Route::get('/printsearch', [SearchController::class, 'printsearch'])->name('web-1.show');



Auth::routes(['verify' => true]);
//V1
//Transfer
Route::get('/transfer', [HomeController::class, 'transfer'])->name('transfer');
Route::get('/transfers', [HomeController::class, 'transfers'])->name('transfers');
Route::post('/transfer', [HomeController::class, 'saveTransfer'])->name('saveTransfer');

//Deposit
Route::get('/deposit', [HomeController::class, 'deposit'])->name('deposit');
Route::post('/deposit', [HomeController::class, 'saveDeposit'])->name('saveDeposit');

//Depositone
Route::get('/deposits', [HomeController::class, 'depositone'])->name('depositone');
Route::post('/deposits', [HomeController::class, 'saveDepositone'])->name('saveDepositone');

//Statement of Account
Route::get('/statement', [HomeController::class, 'statement'])->name('statement');

Route::get('/dashboard', [HomeController::class, 'index1'])->name('dashboard');

Route::get('/withdraw', [HomeController::class, 'withdraw'])->name('withdraw');
Route::post('/withdraw', [HomeController::class, 'saveWithdraw'])->name('saveWithdraw');















Route::get('/{vue_capture?}', function () {
    return view('vuehome');
})->where('vue_capture', '[\/\w\.-]*')->middleware('auth');

// Route::view('/{path?}', 'welcome');
