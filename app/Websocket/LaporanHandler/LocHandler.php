<?php

namespace App\Websocket\LaporanHandler;

use Ratchet\ConnectionInterface;
use Ratchet\RFC6455\Messaging\MessageInterface;
use Ratchet\WebSocket\MessageComponentInterface;

class LocHandler extends BaseLocHandler implements MessageComponentInterface
{
    function onMessage(ConnectionInterface $conn, MessageInterface $msg)
    {
        // $data = json_decode($msg);
        // dump($msg);
        // switch ($data->command) {
        //     case "Subscribe":
        //         $this->subscriptions[$conn->resourceId] = $data->channel;
        //         break;
        //     case "location":
        //         if (isset($this->subscriptions[$conn->resourceId])) {
        //             $target = $this->subscriptions[$conn->resourceId];
        //             foreach ($this->subscriptions as $id => $channel) {
        //                 if ($channel == $target && $id != $conn->resourceId) {
        //                     $this->users[$id]->send($data->message);
        //                 }
        //             }
        //         }
        //         break;
        // }
    }
}
