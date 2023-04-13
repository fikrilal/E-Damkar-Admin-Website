<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Edukasi extends Model
{
    protected $table = 'artikel_edukasu';
    protected $primaryKey = 'id_edukasi';
    protected $fillable = [
        'admin_damkar_id', 'kategori_artikel_id', 'foto_edukasi_id', 'judul_edukasi', 'deskripsi', 'tgl_edukasi'
    ];
}
