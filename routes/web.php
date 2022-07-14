<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PsicologoController;
use App\Http\Controllers\PacienteController;

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

Route::resource('psicologo',PsicologoController::class)->middleware('auth');
Route::resource('paciente',PacienteController::class)->middleware('auth');

Auth::routes(['register' => false,'reset' => false]);

Route::get('/home', [PsicologoController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [PsicologoController::class, 'index'])->name('home');
});
