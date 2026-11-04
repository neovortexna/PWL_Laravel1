<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutgoingLetter extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_surat',
        'tujuan_surat',
        'tanggal_keluar',
        'perihal',
        // Tambahkan kolom lain jika di database Anda ada kolom tambahan
    ];
}