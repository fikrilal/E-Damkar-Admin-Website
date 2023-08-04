<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laporan extends Model
{
    use HasFactory;

    // protected $timestamps = false;

    protected $guarded = ['idLaporan'];

    protected $fillable = [
        'user_listdata_id',
        'status_riwayat_id',
        'kategori_laporan_id',
        'detail_korban_id',
        'tgl_lap',
        'deskripsi_laporan',
        'gambar_bukti_pelaporan',
        'alamat_kejadian',
        'latitude',
        'longitude',
        'urgensi',
        'korban_jiwa',
        'korban_luka',
        'kondisi_cuaca',
        'pihak_lain',
        'kerugian'
    ];



    public function statusRiwayat()
    {
        return $this->belongsTo(StatusRiwayat::class);
    }

    public function kategoriLaporan()
    {
        return $this->belongsTo(KategoriLaporan::class);
    }

    public function detailLaporanPengguna()
    {
        return $this->hasOne(detail_laporan_pengguna::class);
    }

    public function detailLaporanPetugas()
    {
        return $this->hasOne(detail_laporan_petugas::class);
    }

    public function detailKorban()
    {
        return $this->belongsTo(detail_korban::class);
    }
}
