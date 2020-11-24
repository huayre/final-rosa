<?php
        require '../html/vendor/autoload.php';

        require './database.php';
        Use App\models\Carga;
        date_default_timezone_set('PRC');

    use Monolog\Logger;
    use Monolog\Handler\StdoutHandler;


// Create the logger
//$logger = new Logger('my_logger');
// Now add some handlers
//$logger->pushHandler(new StdoutHandler());

        $config = \Kafka\ConsumerConfig::getInstance();
        $config->setMetadataRefreshIntervalMs(10000);
        $config->setMetadataBrokerList('kafka:29092');
        $config->setGroupId('paquete');
        $config->setBrokerVersion('2.6.0');
        $config->setTopics(['paquete']);
//$config->setOffsetReset('earliest');
        $consumer = new \Kafka\Consumer();
//$consumer->setLogger($logger);
        $consumer->start(function ($topic, $part, $message) {
            $objetocarga=new Carga();
            $data=json_decode($message['message']['value']);

            $objetocarga->create([
                'tipo'=>$data->tipo,
                'descripcion'=>$data->descripcion,
                'destino'=>$data->destino
            ]);
            var_dump($message);
        });

