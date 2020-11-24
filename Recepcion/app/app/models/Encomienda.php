<?php

namespace App\models;
use \Illuminate\Database\Eloquent\Model;

class Encomienda extends Model
{
    protected $fillable=['propietario','destino','monto'];
}