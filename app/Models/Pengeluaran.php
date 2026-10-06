<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Pengeluaran extends Model
{
    protected $table = 'pengeluaran';

    protected $primaryKey = 'id_pengeluaran';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable = [
        'id_user',
        'nominal',
        'tanggal',
        'kategori',
        'keterangan',
    ];

    public function user()
    {
        return $this->belongsTo(
            User::class,
            'id_user',
            'id_users'
        );
    }
}
