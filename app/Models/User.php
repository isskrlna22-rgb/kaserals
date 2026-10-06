<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Siswa;
use App\Models\Pengeluaran;
use App\Models\Pengumuman;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    protected $table = 'users';

    protected $primaryKey = 'id_users';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'update_at';

    /**
     * Kolom yang boleh diisi secara mass assignment.
     */
    protected $fillable = [
        'name',
        'email',
        'password_hash',
        'role',
    ];

    /**
     * Kolom yang disembunyikan.
     */
    protected $hidden = [
        'password_hash',
    ];

    /**
     * Memberi tahu Laravel bahwa password
     * disimpan di kolom password_hash.
     */
    public function getAuthPasswordName()
    {
        return 'password_hash';
    }

    /**
     * Relasi User dengan Siswa.
     *
     * users.id_users
     *      ↓
     * siswa.id_user
     */
    public function siswa()
    {
        return $this->hasOne(
            Siswa::class,
            'id_user',
            'id_users'
        );
    }

    /**
     * Relasi User dengan Pengeluaran.
     */
    public function pengeluaran()
    {
        return $this->hasMany(
            Pengeluaran::class,
            'id_user',
            'id_users'
        );
    }

    /**
     * Relasi User dengan Pengumuman.
     */
    public function pengumuman()
    {
        return $this->hasMany(
            Pengumuman::class,
            'id_user',
            'id_users'
        );
    }

    /**
     * Casting atribut.
     */
    protected function casts(): array
    {
        return [
            'password_hash' => 'hashed',
        ];
    }
}
