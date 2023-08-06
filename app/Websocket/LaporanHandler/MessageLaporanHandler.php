<?php


namespace App\Websocket\LaporanHandler;

use App\Http\Resources\LaporanPetugasResources;
use App\Models\laporan;
use PhpParser\JsonDecoder;
use Ratchet\ConnectionInterface;
use Ratchet\RFC6455\Messaging\MessageInterface;
use Ratchet\WebSocket\MessageComponentInterface;

class MessageLaporanHandler extends BaseLaporanHandler implements MessageComponentInterface
{

    function onMessage(ConnectionInterface $conn, MessageInterface $msg)
    {
        $data = json_decode($msg);
        switch ($data->command) {
            case "Subscribe":
                $this->subscriptions[$conn->resourceId] = $data->channel;
                break;
            case "AddData":
                if ($data->user != 'controller') {
                    break;
                }
                $this->sendToAnotherUser($conn);
                break;
            case "Process":
                $this->prosesPelaporan();
                break;
            case "getData":
                $this->getDataLaporan($conn);
                break;
        }
    }

    function prosesPelaporan()
    {
    }

    function getDataLaporan(ConnectionInterface $conn)
    {
        $data = laporan::Where('status_riwayat_id', 1)->get();
        $dlp = json_encode($data);
        $conn->send($dlp);
    }

    // function getDataMessage(ConnectionInterface $conn, $data)
    // {
    //     if (isset($this->subscriptions[$conn->resourceId])) {
    //         $target = $this->subscriptions[$conn->resourceId];
    //         foreach ($this->subscriptions as $id => $channel) {
    //             if ($channel == $target && $id != $conn->resourceId) {
    //                 $dlp = json_encode($data);
    //                 $this->users[$id]->send($dlp);
    //             }
    //         }
    //     }
    // }


    function sendToAnotherUser(ConnectionInterface $conn)
    {
        if (isset($this->subscriptions[$conn->resourceId])) {
            $target = $this->subscriptions[$conn->resourceId];
            foreach ($this->subscriptions as $id => $channel) {
                if ($channel == $target && $id != $conn->resourceId) {
                    $data = laporan::Where('status_riwayat_id', 2)->get();
                    $this->users[$id]->send(json_encode(LaporanPetugasResources::collection($data)));
                }
            }
        }
    }

  
}
