<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_laporan_petugas extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        "damkar_id",
        "waktu_penanganan",
        "waktu_berangkat",
        "waktu_sampai",
        "waktu_selesai",
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

    public function laporan()
    {
        return $this->hasOne(laporan::class);
    }

    public function adminDamkar()
    {
        return $this->belongsTo(admin_damkar::class);
    }
}
