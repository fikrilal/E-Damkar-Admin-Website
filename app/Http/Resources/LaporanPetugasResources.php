<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LaporanPetugasResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "idLaporan" => $this->idLaporan,
            "nama_pelapor" => $this->detailLaporanPengguna->user_listdata->namaLengkap,
            "kategori_laporan" => $this->kategoriLaporan->nama_kategori,
            "urgensi" => $this->detailLaporanPengguna->urgensi,
            "deskripsi" => $this->detailLaporanPengguna->deskripsi_laporan,
            "waktu_pelaporan" => $this->detailLaporanPengguna->waktu_pelaporan,
            "tanggal_pelaporan" => $this->detailLaporanPengguna->tgl_pelaporan,
            "alamat" => $this->detailLaporanPengguna->alamat,
            "latitude" => $this->detailLaporanPengguna->latitude,
            "longitude" => $this->detailLaporanPengguna->longitude,
            "image_url" => $this->detailLaporanPengguna->bukti_foto_laporan_pengguna,
        ];
    }
}
