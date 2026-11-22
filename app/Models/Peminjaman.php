<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $fillable = ['alat_id', 'peminjam', 'jumlah', 'tanggal_pinjam', 'status'];

    public function alat()
    {
        return $this->belongsTo(Alat::class);
    }
}