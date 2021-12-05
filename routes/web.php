<?php

use App\Http\Controllers\SystemController;
use App\Models\System;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});
// Route::get('/systems', function () {
//     return System::all();
//     // return view('welcome');
// });
Route::resource('/systems', SystemController::class);
Route::get('/trying', function () {
    return view('trying');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
