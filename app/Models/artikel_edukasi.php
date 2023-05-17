<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class artikel_edukasi extends Model
{
    use HasFactory;

    public $timestamps = false;
<<<<<<< HEAD
    protected $guarded = ['id_edukasi'];
    protected $fillablle = ["admin_damkar_id", "foto_artikel_edukasi", "judul_edukasi", "deskripsi", "tgl_edukasi"];
=======

    protected $fillabel = ['admin_damkar_id', 'judul_edukasi', 'deskripsi', 'tgl_edukasi', 'foto_artikel_edukasi'];
>>>>>>> bc404493609b18818b73ebf3e30a31f2efd69d9e

    public function adminDamkar()
    {
        return $this->belongsTo(admin_damkar::class);
    }

    public function fotoEdukasi()
    {
        return $this->hasMany(FotoEdukasi::class);
    }

    //     public function kategoriArtikel(){
    //         return $this->belongsTo(kategoriArtikel::class);
    //     }
}
