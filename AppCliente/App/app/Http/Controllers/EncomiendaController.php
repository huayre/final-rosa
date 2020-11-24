<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EncomiendaController extends Controller
{
    private $token;
    public function __construct()
    {
        $this->token=Http::get('appgateway/api/token');
        $this->token=str_replace('"','',$this->token);


    }


    public function listaencomiendas()
   {

       $listaencomienda=Http::withToken($this->token)->get('appgateway/api/listaencomienda');

       $listaencomienda=$listaencomienda->object();

       return view('app.listaencomienda',compact('listaencomienda'));
   }


   public function crearencomienda(Request $request)
   {
       $data=['propietario'=>$request->propietario,'destino'=>$request->destino,'monto'=>$request->monto,
       'tipo'=>$request->tipo,'descripcion'=>$request->descripcion];

       Http::withToken($this->token)->post('appgateway/api/crearencomienda',$data);
       return redirect()->route('listaencomiendas');
   }
}
