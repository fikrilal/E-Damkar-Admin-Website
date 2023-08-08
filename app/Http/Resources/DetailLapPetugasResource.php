<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DetailLapPetugasResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
        "id",
        "damkar_id",
        "waktu_penanganan",
        "tgl_laporan_petugas",
        "deskripsi_petugas",
        "korban_jiwa",
        "korban_luka_ringan",
        "korban_luka_berat",
        "kerugian",
        "luas_lahan",
        "tindakan",
        "pihak_yang_datang",
        "jenis_evakuasi",
        "team_evakuasi",
        "bukti_foto_laporan_petugas"
        ];
    }
}
