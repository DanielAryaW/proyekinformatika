<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
    ];

    public function pesanan()
    {
        return $this->hasMany(Pesanan::class, 'transaksi_id');
    }
}
