<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Student\AssigmnetController;
use App\Http\Controllers\Student\DashboardController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::controller(AssigmnetController::class)->group(function(){
        Route::get('/assignments','index')->name('assgnment.index');
        Route::get('assignments/create','create')->name('assgnment.create');
        Route::post('assignments','store')->name('assgnment.store');
    });
});

require __DIR__.'/auth.php';
