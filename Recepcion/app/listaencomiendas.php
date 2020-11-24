<?php
require '../html/vendor/autoload.php';
require './database.php';
Use App\models\Encomienda;
$modelEncomienda = new Encomienda();
echo json_encode($modelEncomienda::all());