<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_korban extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        "nama_lengkap",
        "NIK",
        "umur"
    ];

    public function laporan()
    {
        return $this->hasOne(laporan::class);
    }
}
