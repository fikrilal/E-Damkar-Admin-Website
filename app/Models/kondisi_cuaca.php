<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kondisi_cuaca extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        "nama_kondisi_cuaca"
    ];
}
