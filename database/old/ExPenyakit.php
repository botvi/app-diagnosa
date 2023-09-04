<?php

namespace Database\Seeders;

use App\Models\Penyakit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExPenyakit extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ["kode_penyakit" => "P001", "nama_penyakit" => "Diare"],
            ["kode_penyakit" => "P002", "nama_penyakit" => "Sembelit"],
            ["kode_penyakit" => "P003", "nama_penyakit" => "Asam Lambung"],
            ["kode_penyakit" => "P004", "nama_penyakit" => "Radang Usus Buntu"],
            ["kode_penyakit" => "P005", "nama_penyakit" => "Infeksi Lambung"]
        ];

        foreach ($data as $item) {
            Penyakit::create([
                'kode_penyakit' => $item['kode_penyakit'],
                'nama_penyakit' => $item['nama_penyakit']
            ]);
        }
    }
}
