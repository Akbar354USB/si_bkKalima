<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporantest extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_siswa',
        'catatan_pelanggaran',
        'sanksi',
    ];
}
