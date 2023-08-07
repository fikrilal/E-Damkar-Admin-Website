<?php

namespace App\Websocket\LaporanHandler;

use Ratchet\ConnectionInterface;
use Ratchet\RFC6455\Messaging\MessageInterface;
use Ratchet\WebSocket\MessageComponentInterface;

class LocHandler extends BaseLocHandler implements MessageComponentInterface
{
    function onMessage(ConnectionInterface $conn, MessageInterface $msg)
    {
        $data = json_decode($msg);
        switch ($data->type) {
            case "Subscribe":
                $this->subscriptions[$conn->resourceId] = $data->channel;
                break;
           
        }
    }
}
