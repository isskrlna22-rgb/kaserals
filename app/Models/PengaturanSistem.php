<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengaturanSistem extends Model
{
    protected $table = 'pengaturan_sistems';

    protected $primaryKey = 'id_pengaturan';

    protected $fillable = [
        'nama_kelas',
        'id_wali_kelas',
        'nominal_kas',
    ];

    public function waliKelas()
    {
        return $this->belongsTo(
            User::class,
            'id_wali_kelas',
            'id_users'
        );
    }
}
