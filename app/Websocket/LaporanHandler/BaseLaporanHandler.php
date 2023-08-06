<?php

namespace App\Websocket\LaporanHandler;

use App\Models\laporan;
use BeyondCode\LaravelWebSockets\Apps\App;
use BeyondCode\LaravelWebSockets\QueryParameters;
use BeyondCode\LaravelWebSockets\WebSockets\Exceptions\UnknownAppKey;
use Exception;
use Ratchet\ConnectionInterface;
use Ratchet\WebSocket\MessageComponentInterface;


abstract class BaseLaporanHandler implements MessageComponentInterface
{

    protected $clients;
    protected $subscriptions;
    protected $users;
    protected $dataLaporans = [];

    public function __construct()
    {
        $this->clients = new \SplObjectStorage;
        $this->subscriptions = [];
        $this->users = [];
    }

    function onOpen(ConnectionInterface $conn)
    {
        $this->verifyAppKey($conn)->generateSocketId($conn);
        $this->clients->attach($conn);
        $this->users[$conn->resourceId] = $conn;
        $message = [
            "condition" => true,
            "message" => "connect",
            "payload" => [
                "message" => "connected successfully"
            ]
        ];
        $conn->send(json_encode($message));
    }

    function onError(ConnectionInterface $conn, Exception $e)
    {
    }

    function onClose(ConnectionInterface $conn)
    {
        $this->clients->detach($conn);
        unset($this->users[$conn->resourceId]);
        unset($this->subscriptions[$conn->resourceId]);
    }

    protected function verifyAppKey(ConnectionInterface $connection)
    {
        $appKey = QueryParameters::create($connection->httpRequest)->get('appKey');

        if (!$app = App::findByKey($appKey)) {
            dump("null");
            throw new UnknownAppKey($appKey);
        }

        $connection->app = $app;

        return $this;
    }

    protected function generateSocketId(ConnectionInterface $connection)
    {
        $socketId = sprintf('%d.%d', random_int(1, 1000000000), random_int(1, 1000000000));

        $connection->socketId = $socketId;

        return $this;
    }
}
