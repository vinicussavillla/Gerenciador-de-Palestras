<?php

use App\Http\Controllers\Auth\CadastroController;
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


Route::get('cadastro', [CadastroController::class, 'create'])->name('auth.cadastro.create'); 
Route::post('cadastro', [CadastroController::class, 'store'])->name('auth.cadastro.store');

Route::get('participante/dashboard', [DashboardController::class, 'index'])
    ->name('participante.dashboard.index');