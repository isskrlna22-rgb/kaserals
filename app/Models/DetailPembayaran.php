<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Siswa;
use App\Models\PembayaranKas;
use App\Models\Transaksi;

class DetailPembayaran extends Model
{
    protected $table = 'detail_pembayaran';

    protected $primaryKey = 'id_detail';

    protected $fillable = [
        'id_pembayaran',
        'id_siswa',
        'minggu_ke',
        'nominal',
    ];

    public function siswa()
    {
        return $this->belongsTo(
            Siswa::class,
            'id_siswa',
            'id_siswa'
        );
    }

    public function pembayaranKas()
    {
        return $this->belongsTo(
            PembayaranKas::class,
            'id_pembayaran',
            'id_pembayaran'
        );
    }

    public function transaksi()
    {
        return $this->hasOneThrough(
            Transaksi::class,
            PembayaranKas::class,
            'id_pembayaran',
            'id_pembayaran',
            'id_pembayaran',
            'id_pembayaran'
        );
    }
}
