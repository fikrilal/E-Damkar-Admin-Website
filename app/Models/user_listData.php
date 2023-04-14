<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class user_listData extends Model
{
    use HasFactory, HasApiTokens;

    public $timestamps = false;

    protected $guarded = ['id'];

    protected $fillabel = ['email', 'password', 'namalengkap', 'noHp'];

    public function laporan()
    {
        return $this->hasMany(laporan::class);
    }
}
