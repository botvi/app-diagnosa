<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProbabilitasGejalaPenyakit extends Model
{
    use HasFactory;
    protected $table = 'probabilitas_gejala_penyakit';
    protected $fillable = ["kode_penyakit", "kode_gejala", "kemunculan", "jumlah_gangguan", "probability", "keterangan"];
}
