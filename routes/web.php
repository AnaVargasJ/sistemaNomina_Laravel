<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NominaController;

use App\Models\Informacion;

//  use Illuminate\Support\Facades\Auth;
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
})->name('inicio');
Auth::routes();
Route::resource('nominas', NominaController::class);

 Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




