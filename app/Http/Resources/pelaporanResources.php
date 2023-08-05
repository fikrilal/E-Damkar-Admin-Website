<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class pelaporanResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "idLaporan" => $this->laporan->idLaporan,
            "Status_riwayat" => $this->laporan->statusRiwayat->nama_status,
            "kategori_laporan" => $this->laporan->kategoriLaporan->nama_kategori,
            "tanggal" => $this->tgl_pelaporan,
            "deskripsi" => $this->deskripsi_laporan,
            "image_url" => $this->bukti_foto_laporan_pengguna,
            "alamat" => $this->alamat,
            "urgensi" => $this->urgensi
        ];
    }
}
