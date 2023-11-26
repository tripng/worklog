<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WorkLogController;
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

Route::view('/login','pages.login');

Route::resource('worklog',WorkLogController::class);
Route::controller(LoginController::class)->group(function(){
    Route::post('authentication','authentication')->name('login');
});
Route::controller(LogController::class)->group(function(){
    Route::get('worklogs','worklog')->name('page.worklog');
});

Route::get('dashboard',DashboardController::class);