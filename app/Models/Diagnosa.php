<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnosa extends Model
{
    use HasFactory;
    protected $table = 'diagnosa';

    protected $fillable = [
        "kode_diagnosa",
        "kode_penyakit",
        "kode_gejala",
        "number_poin",
        "persentase",
        "status"
    ];
}
