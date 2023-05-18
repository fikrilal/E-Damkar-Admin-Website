<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class artikel_berita extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = ['id_berita'];
    protected $fillablle = ["admin_damkar_id", "foto_artikel_berita", "judul_berita", "deskripsi_berita", "tgl_berita"];

    public function adminDamkar()
    {
        return $this->belongsTo(admin_damkar::class);
    }

    public function fotoBerita()
    {
        return $this->hasMany(FotoBerita::class);
    }

    // public function kategoriArtikel(){
    //     return $this->belongsTo(kategoriArtikel::class);
    // }
}
