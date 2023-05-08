<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArtikelBeritaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id_berita" => $this->id_berita,
            "admin_damkar_id" => $this->adminDamkar->nama_lengkap, 
            "foto_berita_id" => $this->fotoBerita->foto_berita, 
            "tanggal" => $this->judul_berita, 
            "deskripsi" => $this->deskripsi_berita, 
            "image_url" => $this->tgl_berita, 
           
        ];
    }
}
