<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aturan extends Model
{
    use HasFactory;
    protected $table = 'aturan';
    protected $fillable = ['kode_penyakit', 'kode_gejala'];


    public function penyakit(){
        return $this->belongsTo(penyakit::class,'kode_penyakit');
    
    }
    public function gejala(){
        return $this->belongsTo(gejala::class);
    
    }
    
}

