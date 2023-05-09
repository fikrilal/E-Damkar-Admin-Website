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
            "admin_damkar" => $this->adminDamkar->nama_lengkap, 
            "foto_berita" => "foto/gambar", 
            "judul_berita" => $this->judul_berita, 
            "deskripsi_berita" => $this->deskripsi_berita, 
            "tanggal_berita" => $this->tgl_berita

        ]; 
    }
}
