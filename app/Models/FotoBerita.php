<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoBerita extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function artikel_berita(){
        return $this->belongsTo(artikel_berita::class);
    }

}
