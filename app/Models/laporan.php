<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laporan extends Model
{
    use HasFactory;

    // protected $timestamps = false;

    protected $guarded = ['idLaporan'];

    protected $fillable = ['user_listdata_id', 'status_riwayat_id', 'kategori_laporan_id', 'tgl_lap', 'deskripsi_laporan', 'gambar_bukti_pelaporan', 'alamat_kejadian', 'latitude', 'longitude' ];

    public function user_listdata()
    {
        return $this->belongsTo(user_listData::class);
    }

    public function statusRiwayat()
    {
        return $this->belongsTo(StatusRiwayat::class);
    }

    public function kategoriLaporan()
    {
        return $this->belongsTo(KategoriLaporan::class);
    }

    public function detailLaporan()
    {
        return $this->hasOne(DetailLaporan::class);
    }
}
