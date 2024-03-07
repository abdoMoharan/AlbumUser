<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImageAlbumController;

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


Route::group(['middleware' => ['auth', 'verified'],'prefix' => 'admin', 'as' => 'admin.'],function(){
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::resource('albums', AlbumController::class)->except('show');
    Route::get('albums/{id}/images',[AlbumController::class,'delete_album'])->name('albums.images.delete');
});
require __DIR__.'/auth.php';
