<?php
namespace App\models;
use \Illuminate\Database\Eloquent\Model;

class Carga extends Model
{
   protected $fillable=['tipo','descripcion','destino'];
}