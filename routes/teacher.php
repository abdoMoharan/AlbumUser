<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Teacher\DashboardController;
use App\Http\Controllers\Teacher\Auth\LoginController;
use App\Http\Controllers\Teacher\Auth\RegisterController;
use App\Http\Controllers\Teacher\QuestionController;

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

Route::middleware('guest:teacher')->prefix('teacher')->group( function () {

    Route::get('login', [LoginController::class, 'create'])->name('teacher.login');
    Route::post('login', [LoginController::class, 'store'])->name('teacher.login.store');

    Route::get('register', [RegisterController::class, 'create'])->name('teacher.register');
    Route::post('register', [RegisterController::class, 'store'])->name('teacher.register.store');

});

Route::group(['middleware' => ['auth:teacher'], 'prefix' => 'teacher', 'as' => 'teacher.'], function () {

    Route::post('logout', [LoginController::class, 'destroy'])->name('logout');

    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

    Route::controller(QuestionController::class)->group(function(){
        Route::get('questions', 'index')->name('question.index');
        Route::get('questions/create', 'create')->name('question.create');
        Route::post('questions', 'store')->name('question.store');
        Route::delete('questions/{question}', 'destroy')->name('question.destroy');
    });
});
