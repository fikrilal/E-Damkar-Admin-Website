<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoEdukasi extends Model
{
    use HasFactory;

    public $timestamp = false;

    public function artikel_edukasi(){
        return $this->belongsTo(artikel_edukasi::class);
    }
}
