<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_booking',
        'id_produk',
        'qty',
        'harga_sewa',
        'tanggal_kembali_seharusnya',
        'tanggal_dikembalikan',
        'keterlambatan_hari',
        'denda_per_hari',
        'total_denda',
        'catatan_pengembalian'
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class, 'id_booking');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }
}
