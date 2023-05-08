<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 'artikel_berita';
    protected $primaryKey = 'id_berita';
    protected $fillable = [
        'admin_damkar_id', 'foto_berita_id', 'judul_berita', 'deskripsi_berita', 'tgl_berita'
    ];
}
