<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_customer',
        'tanggal_booking',
        'tanggal_mulai',
        'tanggal_selesai',
        'status',
        'total_harga',
        'total_denda'
    ];

    public function customer()
    {
        return $this->belongsTo(Akun::class, 'id_customer');
    }

    public function detailBookings()
    {
        return $this->hasMany(DetailBooking::class, 'id_booking');
    }
}
