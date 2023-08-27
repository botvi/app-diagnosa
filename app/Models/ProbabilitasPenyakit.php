<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProbabilitasPenyakit extends Model
{
    use HasFactory;
    protected $table = 'probabilitas_penyakit';
    protected $fillable = ["kode_penyakit", "kode_gejala", "jumlah_seluruh_penyakit", "jumlah_kemunculan", "probability", "keterangan"];
}
