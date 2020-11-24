<?php


namespace App\Http\Controllers;




use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CargaController extends Controller
{
    private $token;
    public function __construct()
    {
        $this->token=Http::get('appgateway/api/token');
        $this->token=str_replace('"','',$this->token);
    }

  public function listacarga()
  {
      $listacarga=Http::withToken($this->token)->get('appgateway/api/listacarga');
      $listacarga=$listacarga->object();
     return view('app.listacarga',compact('listacarga'));
  }
}
