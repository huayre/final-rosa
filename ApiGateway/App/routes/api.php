<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GatewayCargaController;
use App\Http\Controllers\GatewayEncomiendaController;
use App\Http\Controllers\GatewayCompraController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('token', [AuthController::class, 'Token'])->name('token');

Route::group(['middleware' => 'auth:api'], function(){
//encomienda
Route::get('listaencomienda', [GatewayEncomiendaController::class, 'encomienda'])->name('listaencomienda');

Route::post('crearencomienda', [GatewayEncomiendaController::class, 'crearencomienda'])->name('crearencomienda');

Route::get('listacarga', [GatewayCargaController::class, 'listacarga'])->name('listacarga');

});
