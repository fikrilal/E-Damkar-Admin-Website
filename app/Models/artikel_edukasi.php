<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class artikel_edukasi extends Model
{
    use HasFactory;


    public $timestamps = false;


    public function adminDamkar()
    {
        return $this->belongsTo(admin_damkar::class);
    }

    public function fotoEdukasi(){
        return $this->hasMany(FotoEdukasi::class);
    }

    public function kategoriArtikel(){
        return $this->belongsTo(kategoriArtikel::class);
    }
}
