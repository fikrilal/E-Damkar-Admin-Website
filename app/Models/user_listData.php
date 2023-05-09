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

    protected $fillable = ['email', 'password', 'namalengkap', 'noHp', 'kodeOtp', 'status'];


    public function laporan()
    {
        return $this->hasMany(laporan::class);
    }
}
