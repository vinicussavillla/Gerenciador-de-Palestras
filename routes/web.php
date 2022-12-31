<?php

use App\Http\Controllers\Auth\{
    LoginController, 
    CadastroController};
use App\Http\Controllers\Participante\Dashboard\DashboardController;
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

Route::group([ 'as' =>'auth.','middleware' =>'guest'], function(){
    Route::get('cadastro', [CadastroController::class, 'create'])->name('cadastro.create'); 
    Route::post('cadastro', [CadastroController::class, 'store'])->name('cadastro.store');
    Route::get('login', [LoginController::class, 'create'])->name('login.create'); 
    Route::post('login', [LoginController::class, 'store'])->name('login.store'); 
});


Route::get('participante/dashboard', [DashboardController::class, 'index'])
    ->name('participante.dashboard.index')
    ->middleware('auth');
