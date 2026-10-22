<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PembayaranKas extends Model
{
    protected $table = 'pembayaran_kas';

    protected $primaryKey = 'id_pembayaran';

    protected $fillable = [
        'id_siswa',
        'metode_pembayaran',
        'bukti_transfer',
        'tanggal',
        'keterangan',
    ];

    public function siswa()
    {
        return $this->belongsTo(
            Siswa::class,
            'id_siswa',
            'id_siswa'
        );
    }

    public function transaksi()
    {
        return $this->hasOne(
            Transaksi::class,
            'id_pembayaran',
            'id_pembayaran'
        );
    }

    public function detailPembayaran()
    {
        return $this->hasOne(
            DetailPembayaran::class,
            'id_pembayaran',
            'id_pembayaran'
        );
    }
}
