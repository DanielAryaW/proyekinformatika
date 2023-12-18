<?php
// app/Models/Jasa.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jasa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_jasa',
        'harga_jasa',
        'deskripsi',
        'foto_desain',
    ];

    public function pesanan()
    {
        return $this->hasMany(Pesanan::class, 'jasa_id');
    }

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }
}
