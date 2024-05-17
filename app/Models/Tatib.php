<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tatib extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_tatib',
        'nama_tatib',
        'kategori'
    ];
}
