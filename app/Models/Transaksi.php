<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\PembayaranKas;
use App\Models\Siswa;

class Transaksi extends Model
{
    protected $table = 'transaksi';

    protected $primaryKey = 'id_transaksi';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'update_at';

    protected $fillable = [
        'id_pembayaran',
        'id_siswa',
        'status',
    ];

    public function pembayaran()
    {
        return $this->belongsTo(
            PembayaranKas::class,
            'id_pembayaran',
            'id_pembayaran'
        );
    }

    public function siswa()
    {
        return $this->belongsTo(
            Siswa::class,
            'id_siswa',
            'id_siswa'
        );
    }
}
