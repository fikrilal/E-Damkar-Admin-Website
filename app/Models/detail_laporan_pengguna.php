<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_laporan_pengguna extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        "user_listdata_id",
        "deskripsi_laporan",
        "nama_hewan",
        "waktu_pelaporan",
        "tgl_pelaporan",
        "urgensi",
        "alamat",
        "latitude",
        "longitude",
        "bukti_foto_laporan_pengguna"
    ];

    public function user_listdata()
    {
        return $this->belongsTo(user_listData::class);
    }

    public function laporan()
    {
        return $this->belongsTo(laporan::class);
    }
}
