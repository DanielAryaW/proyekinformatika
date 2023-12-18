<?php
// app/Models/Pesanan.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'jumlah',
        'deskripsi',
        'foto_desain',
        'jasa_id', // Tambahkan kolom jasa_id untuk relasi dengan model Jasa
        'client_id', // Tambahkan kolom client_id untuk relasi dengan model Client
        'transaksi_id', // Tambahkan kolom transaksi_id untuk relasi dengan model Transaksi
        'no_pesanan',
        'nama_jasa',
        'nama_pemesan',
        'harga_total',
        'bukti_pembayaran'

    ];
    /**
     * Define the relationship with Client model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    /**
     * Define the relationship with Jasa model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function jasa()
    {
        return $this->belongsTo(Jasa::class, 'jasa_id');
    }

    /**
     * Define the relationship with Transaksi model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'transaksi_id');
    }

}
