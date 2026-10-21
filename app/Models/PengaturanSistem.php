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
    'id_bendahara',
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

public function bendahara()
{
    return $this->belongsTo(
        User::class,
        'id_bendahara',
        'id_users'
    );
}

}
