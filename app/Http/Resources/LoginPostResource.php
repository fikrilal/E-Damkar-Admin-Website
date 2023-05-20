<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoginPostResource extends JsonResource
{
    public static $wrap = null;
    public $kondisi;
    public $token;
    public $message;

    public function __construct($kondisi, $token, $message, $resource)
    {
        parent::__construct($resource);
        $this->kondisi = $kondisi;
        $this->token = $token;
        $this->message = $message;
    }
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        if ($this->kondisi) {
            $jsonReturn =  [
                'status' => $this->kondisi,
                'message' => $this->message,
                'token' => $this->token,
                'data' => [
                    'id' => $this->resource->id,
                    'username' => $this->resource->username,
                    'namaLengkap' => $this->namaLengkap,
                    'noHp' => $this->noHp,
                    'foto_user' => $this->foto_user
                ]
            ];
        } else {
            $jsonReturn =  [
                'status' => $this->kondisi,
                'message' => $this->message,
            ];
        }
        return $jsonReturn;
    }
}
