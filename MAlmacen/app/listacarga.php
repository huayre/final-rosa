<?php
require '../html/vendor/autoload.php';
require './database.php';
Use App\models\Carga;
$modelCarga = new Carga();
echo json_encode($modelCarga::all());
