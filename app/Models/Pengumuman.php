<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Pengumuman extends Model
{
    protected $table = 'pengumuman';

    protected $primaryKey = 'id_pengumuman';

    protected $fillable = [
        'id_user',
        'judul',
        'isi',
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
