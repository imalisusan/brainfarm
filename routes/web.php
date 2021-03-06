<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CropController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\CountyController;
use App\Http\Controllers\FarmerController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\FarmerCropController;
use App\Http\Controllers\ExpenditureController;
use App\Http\Controllers\CropSuggestionController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');



Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::resources([
        'farmers' => FarmerController::class,
        'incomes' => IncomeController::class,
        'expenditures' => ExpenditureController::class,
        'users' => UserController::class,
        'crops' => CropController::class,
        'farmercrops' => FarmerCropController::class,
        'cropsuggestions' => CropSuggestionController::class,
        'counties' => CountyController::class,  
        
    ]);

    Route::get('/home',[HomeController::class, 'index'])->name('home');
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    Route::get('/approve/{farmer}',[FarmerController::class, 'approve_farmer'])->name('farmers.approve');
    Route::get('/suspend/{farmer}',[FarmerController::class, 'suspend_farmer'])->name('farmers.suspend');
    Route::get('/reset/{farmer}',[FarmerController::class, 'reset_password_farmer'])->name('farmers.reset');
    Route::get('pending/accounts', [FarmerController::class, 'pending_accounts'])->name('farmers.pending');
    Route::get('suspended/accounts', [FarmerController::class, 'suspended_accounts'])->name('farmers.suspended');

    Route::get('/charts/crops', [ChartController::class, 'crops'])->name('charts.crops');
    Route::get('/charts/users', [ChartController::class, 'users'])->name('charts.users');
    Route::get('/charts/income', [ChartController::class, 'income'])->name('charts.income');
    Route::get('/charts/expenditure', [ChartController::class, 'expenditure'])->name('charts.expenditure');
    Route::get('/charts/profit', [ChartController::class, 'profit'])->name('charts.profit');


});