<?php

use App\Http\Controllers\Auth\{
    LoginController, 
    CadastroController};
use App\Http\Controllers\Participante\Dashboard\DashboardController as ParticipanteDashboardController;
use App\Http\Controllers\Organizacao\Dashboard\DashboardController as OrnizacaoDashboardController;
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

Route::group([ 'as' =>'auth.'], function(){
    Route::group(['middleware'=>'guest'], function(){
        Route::get('cadastro', [CadastroController::class, 'create'])->name('cadastro.create'); 
        Route::post('cadastro', [CadastroController::class, 'store'])->name('cadastro.store');
        Route::get('login', [LoginController::class, 'create'])->name('login.create'); 
        Route::post('login', [LoginController::class, 'store'])->name('login.store');
    });
    
    Route::post('logout', [LoginController::class, 'destroy'])->name('login.destroy');

});

Route::group(['middleware' => 'auth'], function () {
    Route::get('participante/dashboard', [ParticipanteDashboardController::class, 'index'])
    ->name('participante.dashboard.index')
    ->middleware('role:participante');

    Route::get('organizacao/dashboard', [OrnizacaoDashboardController::class, 'index'])
    ->name('organizacao.dashboard.index')
    ->middleware('role:organizacao');
    ;    
});

