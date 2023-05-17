<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EdukasiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "jenis_artikel" => "Edukasi",
            "id" => $this->id_edukasi,
            "admin_damkar" => $this->adminDamkar->nama_lengkap, 
            "foto" => "foto/gambar", 
            "judul" => $this->judul_edukasi, 
            "deskripsi" => $this->deskripsi, 
            "tanggal" => $this->tgl_edukasi
        ];
    }
}
