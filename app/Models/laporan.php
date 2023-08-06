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
        'status_riwayat_id',
        'kategori_laporan_id',
        'detail_korban_id',
        'kondisi_cuaca_id',
        'detail_laporan_pengguna_id',
        'detail_laporan_petugas_id'
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
        return $this->belongsTo(detail_laporan_pengguna::class);
    }

    public function detailLaporanPetugas()
    {
        return $this->belongsTo(detail_laporan_petugas::class);
    }

    public function detailKorban()
    {
        return $this->belongsTo(detail_korban::class);
    }

    public function kondisiCuaca()
    {
        return $this->belongsTo(kondisi_cuaca::class);
    }
}
