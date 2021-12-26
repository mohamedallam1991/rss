<?php

use App\Models\System;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\AuditController;
use App\Http\Controllers\SystemController;
use App\Http\Controllers\StructureController;

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

Route::middleware('auth')->group(function () {
    Route::resource('/structures', StructureController::class);
    Route::resource('/systems', SystemController::class);
    Route::resource('/audits', AuditController::class);
});

Route::get('/trying', function () {
    return view('trying');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
