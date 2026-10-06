<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\PembayaranKas;

class Siswa extends Model
{
    protected $table = 'siswa';

    protected $primaryKey = 'id_siswa';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable = [
        'id_user',
        'nisn',
        'nama_lengkap',
        'kelas',
        'no_hp',
    ];

    public function user()
    {
        return $this->belongsTo(
            User::class,
            'id_user',
            'id_users'
        );
    }

    public function pembayaranKas()
    {
        return $this->hasMany(
            PembayaranKas::class,
            'id_siswa',
            'id_siswa'
        );
    }
}
