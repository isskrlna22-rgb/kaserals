<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Siswa;

class PembayaranKas extends Model
{
    protected $table = 'pembayaran_kas';

    protected $fillable = [
        'siswa_id',
        'nominal',
        'periode',
        'tanggal',
        'keterangan',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'nominal' => 'decimal:2',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
