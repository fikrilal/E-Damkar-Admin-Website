<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class pelaporanDetailResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            "idLaporan" => $this->idLaporan,
            "Status_riwayat" => $this->statusRiwayat->nama_status,
            "kategori_laporan" => $this->kategoriLaporan->nama_kategori,
            "tanggal" => $this->detailLaporanPengguna->tgl_pelaporan,
            "deskripsi" => $this->detailLaporanPengguna->deskripsi_laporan,
            "image_url" => $this->detailLaporanPengguna->bukti_foto_laporan_pengguna,
            "alamat" => $this->detailLaporanPengguna->alamat,
            "urgensi" => $this->detailLaporanPengguna->urgensi
        ];
    }
}
