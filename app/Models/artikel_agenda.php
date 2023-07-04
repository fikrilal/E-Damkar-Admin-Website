<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class artikel_agenda extends Model
{
    use HasFactory;

    protected $guarded = ['id_agenda'];
    protected $fillablle = ["admin_damkar_id", "judul_agenda", "tgl_agenda"];
    public $timestamps = false;

    public function adminDamkar()
    {
        return $this->belongsTo(admin_damkar::class);
    }

    // public function fotoAgenda()
    // {
    //     return $this->hasMany(FotoAgenda::class);
    // }
}
