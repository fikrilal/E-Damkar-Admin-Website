<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_laporan_petugas extends Model
{
    use HasFactory;

    protected $fillable = [
        "damkar_id",
        "waktu_penanganan",
        "tgl_laporan_petugas",
        "deskripsi_petugas",
        "korban_jiwa",
        "korban_luka",
        "kerugian",
        "bukti_foto_laporan"
    ];

    public function laporan()
    {
        return $this->belongsTo(laporan::class);
    }

    public function adminDamkar()
    {
        return $this->belongsTo(admin_damkar::class);
    }
}
