<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontHomeController;
use App\Http\Controllers\Back\BackHomeController;


// FRONTEND DESIGN
Route::prefix('front')->name('front.')->group(function () {
    Route::get('/', FrontHomeController::class)->middleware('auth')->name('index');
});

require __DIR__ . '/auth.php';







// BACK DESIGN
Route::prefix('back')->name('back.')->group(function () {
    Route::get('/', BackHomeController::class)->middleware('admin')->name('index');


    require __DIR__ . '/adminAuth.php';


});




Route::get('/', function () {
    return view('welcome');
});