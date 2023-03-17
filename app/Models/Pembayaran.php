<?php

namespace App\Models;

use App\Models\Sppss;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pembayaran extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'spps_id',
        'bulan_bayar',
        'tgl_bayar',
        'status',
        'jumlah_bayar'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function spps()
    {
        return $this->belongsTo(Spps::class);
    }
}
