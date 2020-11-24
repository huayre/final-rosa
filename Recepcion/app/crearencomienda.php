<?php

require '../html/vendor/autoload.php';
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require './database.php';
Use App\models\Encomienda;
$modelEncomienda = new Encomienda();
$data=file_get_contents("php://input");
$data=json_decode($data,true);
$propietario=$data['propietario'];
$destino=$data['destino'];
$monto=$data['monto'];

//
$modelEncomienda->create([
    'propietario'      =>$propietario,
    'destino'      =>$destino,
    'monto'  =>$monto,
]);

$config = \Kafka\ProducerConfig::getInstance();
$config->setMetadataRefreshIntervalMs(10000);
$config->setMetadataBrokerList('kafka:29092');
$config->setBrokerVersion('2.6.0');
$config->setRequiredAck(1);
$config->setIsAsyn(false);
$config->setProduceInterval(500);
$producer = new \Kafka\Producer(
    function() {
        $data=file_get_contents("php://input");
        $data=json_decode($data,true);
         $tipo=$data['tipo'];
        $descripcion=$data['descripcion'];
        $destino=$data['destino'];

        $datos=['tipo'=>$tipo,'descripcion'=>$descripcion,'destino'=>$destino];
        return [
            [
                'topic' => 'paquete',
                'value' => json_encode($datos),
                'key' => 'testkey',
            ],
        ];
    }
);

//$producer->setLogger($logger);
$producer->success(function($result) {
    var_dump($result);
});
$producer->error(function($errorCode) {
    var_dump($errorCode);
});
$producer->send(true);
