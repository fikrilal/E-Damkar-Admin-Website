<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArtikelBerita_2Resource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "jenis_artikel" => "berita",
            "id" => $this->id_berita,
            "admin_damkar" => $this->adminDamkar->nama_lengkap,
            "foto" => $this->foto_artikel_berita,
            "judul" => $this->judul_berita,
            "deskripsi" => $this->deskripsi_berita,
            "tanggal" => $this->tgl_berita
        ];
    }
}
