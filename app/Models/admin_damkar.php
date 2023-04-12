<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin_damkar extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function artikel_berita(){
        return $this->hasMany(artikel_berita::class);
    }

    public function artikel_edukasi(){
        return $this->hasMany(artikel_edukasi::class);
    }

    public function kedudukan(){
        return $this->belongsTo(kedudukan::class);
    }
}
