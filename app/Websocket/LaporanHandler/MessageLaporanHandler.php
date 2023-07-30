<?php


namespace App\Websocket\LaporanHandler;

use PhpParser\JsonDecoder;
use Ratchet\ConnectionInterface;
use Ratchet\RFC6455\Messaging\MessageInterface;
use Ratchet\WebSocket\MessageComponentInterface;

class MessageLaporanHandler extends BaseLaporanHandler implements MessageComponentInterface
{

    function onMessage(ConnectionInterface $conn, MessageInterface $msg)
    {
        $data = json_decode($msg);
        $payload = $data->payload ?? [];
        switch ($data->command) {
            case "Subscribe":
                $this->subscriptions[$conn->resourceId] = $data->channel;
                break;
            case "AddData":
                $this->sendToAnotherUser($conn, $payload);
                break;
            case "Process":
                $this->prosesPelaporan();
                break;
        }
    }

    function prosesPelaporan()
    {
    }



    function sendToAnotherUser(ConnectionInterface $conn, $data)
    {
        array_push($this->dataLaporans, $data);
        if (isset($this->subscriptions[$conn->resourceId])) {
            $target = $this->subscriptions[$conn->resourceId];
            foreach ($this->subscriptions as $id => $channel) {
                if ($channel == $target && $id != $conn->resourceId) {
                    $dlp = json_encode($this->dataLaporans);
                    $this->users[$id]->send($dlp);
                }
            }
        }
    }
}
