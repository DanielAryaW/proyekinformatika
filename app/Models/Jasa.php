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
}
