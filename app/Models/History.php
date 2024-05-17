<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_riwayat',
        'siswa_id',
        'tatib_id'
    ];

    public function siswa(){
        return $this->belongsTo(Student::class);
    }

    public function tatib(){
        return $this->belongsTo(Tatib::class);
    }
}
