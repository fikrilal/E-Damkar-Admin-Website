<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_listData extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = ['id'];

    public function laporan(){
        return $this->hasMany(laporan::class);
    }
}
