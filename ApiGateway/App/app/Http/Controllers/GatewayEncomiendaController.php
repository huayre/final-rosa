<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GatewayEncomiendaController extends Controller
{

    public function encomienda()
    {
        $listaencomiendas=Http::get('apprecepcion/listaencomiendas.php');
        $listaencomiendas=$listaencomiendas->object();
        return response()->json($listaencomiendas);
    }
    public function crearencomienda(Request $request)
    {
        $data=['propietario'=>$request->propietario,'destino'=>$request->destino,'monto'=>$request->monto,
            'tipo'=>$request->tipo,'descripcion'=>$request->descripcion];

        Http::post('apprecepcion/crearencomienda.php',$data);
    }

}
