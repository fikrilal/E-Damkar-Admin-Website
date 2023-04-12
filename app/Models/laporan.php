<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laporan extends Model
{
    use HasFactory;

    public $timestamp = false;

    protected $guarded = ['idLaporan'];

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
