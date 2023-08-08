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
            case "Request":
                $this->onRequest($conn, $data);
                break;
            case "Response":
                $this->onResponse($conn, $data);
                break;
        }
    }


    function onRequest(ConnectionInterface $conn, $data)
    {
        if (isset($this->subscriptions[$conn->resourceId])) {
            $target = $this->subscriptions[$conn->resourceId];
            foreach ($this->subscriptions as $id => $channel) {
                if ($channel == $target && $id != $conn->resourceId) {
                    $jsonData = json_encode($data);
                    $this->users[$id]->send($jsonData);
                }
            }
        }
    }
    function onResponse(ConnectionInterface $conn, $data)
    {
        if (isset($this->subscriptions[$conn->resourceId])) {
            $target = $this->subscriptions[$conn->resourceId];
            foreach ($this->subscriptions as $id => $channel) {
                if ($channel == $target && $id != $conn->resourceId) {
                    $sendMessage = [
                        "type" => $data->type,
                        "message" => $data->message
                    ];
                    $jsonData = json_encode($sendMessage);
                    $this->users[$id]->send($jsonData);
                }
            }
        }
    }
}
