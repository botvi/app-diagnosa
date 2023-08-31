<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnosa extends Model
{
    use HasFactory;
    protected $table = 'diagnosa';

    protected $fillable = [
        "pasien_id",
        "kode_diagnosa",
        "kode_penyakit",
        "kode_gejala",
        "number_poin",
        "persentase",
        "status"
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'pasien_id'); // Omit the second parameter if you're following convention
    }
}
