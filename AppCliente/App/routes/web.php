<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EncomiendaController;
use App\Http\Controllers\CargaController;
use App\Http\Controllers\CompraController;
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
    return view('app.inicio');
});

Route::get('listaencomiendas',[EncomiendaController::class,'listaencomiendas'])->name('listaencomiendas');
Route::post('crearencomienda',[EncomiendaController::class,'crearencomienda'])->name('crearencomienda');

Route::get('listacarga',[CargaController::class,'listacarga'])->name('listacarga');

