<?php

namespace Database\Seeders;

use App\Models\Aturan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExAturan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ["kode_penyakit" => "P001", "kode_gejala" => "G001"],
            ["kode_penyakit" => "P001", "kode_gejala" => "G002"],
            ["kode_penyakit" => "P001", "kode_gejala" => "G003"],
            ["kode_penyakit" => "P001", "kode_gejala" => "G004"],
            ["kode_penyakit" => "P001", "kode_gejala" => "G005"],
            ["kode_penyakit" => "P001", "kode_gejala" => "G006"],
            ["kode_penyakit" => "P002", "kode_gejala" => "G004"],
            ["kode_penyakit" => "P002", "kode_gejala" => "G006"],
            ["kode_penyakit" => "P002", "kode_gejala" => "G007"],
            ["kode_penyakit" => "P002", "kode_gejala" => "G008"],
            ["kode_penyakit" => "P002", "kode_gejala" => "G009"],
            ["kode_penyakit" => "P002", "kode_gejala" => "G010"],
            ["kode_penyakit" => "P002", "kode_gejala" => "G011"],
            ["kode_penyakit" => "P002", "kode_gejala" => "G012"],
            ["kode_penyakit" => "P003", "kode_gejala" => "G013"],
            ["kode_penyakit" => "P003", "kode_gejala" => "G014"],
            ["kode_penyakit" => "P003", "kode_gejala" => "G015"],
            ["kode_penyakit" => "P003", "kode_gejala" => "G016"],
            ["kode_penyakit" => "P003", "kode_gejala" => "G017"],
            ["kode_penyakit" => "P004", "kode_gejala" => "G004"],
            ["kode_penyakit" => "P004", "kode_gejala" => "G008"],
            ["kode_penyakit" => "P004", "kode_gejala" => "G018"],
            ["kode_penyakit" => "P004", "kode_gejala" => "G019"],
            ["kode_penyakit" => "P004", "kode_gejala" => "G020"],
            ["kode_penyakit" => "P004", "kode_gejala" => "G021"],
            ["kode_penyakit" => "P004", "kode_gejala" => "G022"],
            ["kode_penyakit" => "P005", "kode_gejala" => "G013"],
            ["kode_penyakit" => "P005", "kode_gejala" => "G023"],
            ["kode_penyakit" => "P005", "kode_gejala" => "G024"],
            ["kode_penyakit" => "P005", "kode_gejala" => "G025"],
            ["kode_penyakit" => "P005", "kode_gejala" => "G026"]
        ];

        foreach ($data as $item) {
            Aturan::create([
                'kode_penyakit' => $item['kode_penyakit'],
                'kode_gejala' => $item['kode_gejala'],
            ]);
        }
    }
}
