<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'email',
        'telepon',    // <-- WAJIB ADA
        'alamat',
    ];

    public function peminjamans()
    {
        return $this->hasMany(Peminjaman::class);
    }
}