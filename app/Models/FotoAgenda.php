<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoAgenda extends Model
{
    use HasFactory;


    public $timestamps = false;

    public function artikel_agenda()
    {
        return $this->belongsTo(artikel_agenda::class);
    }
}
