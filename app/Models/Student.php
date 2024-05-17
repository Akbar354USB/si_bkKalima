<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'nis',
        'nama',
        'jenis_kelamin',
        'alamat',
        'kelas_id'
    ];

    public function kelas(){
        return $this->belongsTo(ClasStudent::class);
    }
}
