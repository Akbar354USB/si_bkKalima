<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_siswa',
        'pelanggaran',
        'kelas_id'
    ];

    public function kelas(){
        return $this->belongsTo(ClasStudent::class);
    }
}
