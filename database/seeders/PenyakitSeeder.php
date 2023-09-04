<?php

namespace Database\Seeders;

use App\Models\Penyakit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenyakitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                "kode_penyakit" => "P001",
                "nama_penyakit" => "Parasit Darah",
                "pengobatan" => "",
                "definisi" => ""
            ],
            [
                "kode_penyakit" => "P002",
                "nama_penyakit" => "Tympani",
                "pengobatan" => "",
                "definisi" => ""
            ],
            [
                "kode_penyakit" => "P003",
                "nama_penyakit" => "Brucellosis",
                "pengobatan" => "",
                "definisi" => ""
            ],
            [
                "kode_penyakit" => "P004",
                "nama_penyakit" => "Jumrana",
                "pengobatan" => "",
                "definisi" => ""
            ],
            [
                "kode_penyakit" => "P005",
                "nama_penyakit" => "PMK",
                "pengobatan" => "",
                "definisi" => ""
            ],
            [
                "kode_penyakit" => "P006",
                "nama_penyakit" => "SE",
                "pengobatan" => "",
                "definisi" => ""
            ]
        ];



        foreach ($data as $item) {
            Penyakit::create([
                'kode_penyakit' => $item['kode_penyakit'],
                'nama_penyakit' => $item['nama_penyakit'],
                'pengobatan' => $item['pengobatan'] ?? "-",
                'deskripsi' => $item['definisi'],
            ]);
        }
    }
}
