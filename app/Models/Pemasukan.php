<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Pemasukan extends Model
{
    protected $table = 'pemasukan';

    protected $fillable = [
        'user_id',
        'nominal',
        'tanggal',
        'sumber',
        'keterangan',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'nominal' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
