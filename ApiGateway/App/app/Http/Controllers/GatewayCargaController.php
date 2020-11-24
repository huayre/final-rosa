<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GatewayCargaController extends Controller
{
  public function listacarga()
  {
      $listaventas=Http::get('appalmacen/listacarga.php');
      $listaventas=$listaventas->object();
      return response()->json($listaventas);
  }

}
