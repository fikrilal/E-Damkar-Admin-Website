<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AgendaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "jenis_artikel" => "Agenda",
            "id" => $this->id_agenda,
            "admin_damkar" => $this->adminDamkar->nama_lengkap, 
            "foto" => "foto/gambar", 
            "judul" => $this->judul_agenda, 
            "deskripsi" => $this->deskripsi, 
            "tanggal" => $this->tgl_agenda
        ];
    }
}
