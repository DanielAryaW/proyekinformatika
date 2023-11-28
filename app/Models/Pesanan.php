<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $fillable =
        [
            'file',
            'quantity',
            'deskripsi',
            'namaJasa',
            'hargaJasa'
        ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
