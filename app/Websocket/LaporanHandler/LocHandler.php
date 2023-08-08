<?php

namespace App\Websocket\LaporanHandler;

use Ratchet\ConnectionInterface;
use Ratchet\RFC6455\Messaging\MessageInterface;
use Ratchet\WebSocket\MessageComponentInterface;
use Spatie\LaravelIgnition\Recorders\DumpRecorder\Dump;

class LocHandler extends BaseLocHandler implements MessageComponentInterface
{
    function onMessage(ConnectionInterface $conn, MessageInterface $msg)
    {
        $data = json_decode($msg);
        switch ($data->command) {
            case "Subscribe":
                echo 'onsubs';
                $this->subscriptions[$conn->resourceId] = $data->channel;
                break;
            case "location":
                echo 'onLocation';
                if (isset($this->subscriptions[$conn->resourceId])) {
                    $target = $this->subscriptions[$conn->resourceId];
                    foreach ($this->subscriptions as $id => $channel) {
                        if ($channel == $target && $id != $conn->resourceId) {
                            $jsonData = json_encode($data->message);
                            $this->users[$id]->send($jsonData);
                        }
                    }
                }
                break;
        }
    }
}
