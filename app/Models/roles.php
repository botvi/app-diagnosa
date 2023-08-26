<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    use HasFactory;
    protected $table = 'roles';

    protected $fillable = [
        'kode_roles',
        'kode_penyakit',
        'kode_gejala',
       
    ];

   
    public function Penyakit()
    {
        return $this->belongsTo(penyakit::class, 'nama_penyakit');
    }

    public function Gejala()
    {
        return $this->belongsTo(gejala::class, 'nama_gejala');

    }

}
