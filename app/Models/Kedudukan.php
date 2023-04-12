<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kedudukan extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function admin_damkar(){
        return $this->hasMany(admin_damkar::class);
    }
}
