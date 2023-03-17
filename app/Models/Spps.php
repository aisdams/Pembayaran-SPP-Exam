<?php

namespace App\Models;

use App\Models\User;
use App\Models\Pembayaran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Spps extends Model
{
    use HasFactory;
    protected $fillable = [
        'tahun',
        'nominal'
    ];

    public function user(){
        return $this->hasMany(User::class);
    }

    public function pembayaran(){
        return $this->hasMany(Pembayaran::class);
    }
}
