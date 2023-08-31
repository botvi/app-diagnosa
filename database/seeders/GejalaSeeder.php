<?php

namespace Database\Seeders;

use App\Models\Gejala;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GejalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ["kode_gejala" => "G001", "nama_gejala" => "berat badan menyusut"],
            ["kode_gejala" => "G002", "nama_gejala" => "suhu tubuh tinggi"],
            ["kode_gejala" => "G003", "nama_gejala" => "pembengkakkan limfatikuss nodus"],
            ["kode_gejala" => "G004", "nama_gejala" => "anemia"],
            ["kode_gejala" => "G005", "nama_gejala" => "gelisah"],
            ["kode_gejala" => "G006", "nama_gejala" => "bagian perut kiri menggembung"],
            ["kode_gejala" => "G007", "nama_gejala" => "susah bernafas"],
            ["kode_gejala" => "G008", "nama_gejala" => "menghentak-hentakkan kaki"],
            ["kode_gejala" => "G009", "nama_gejala" => "sering memejam"],
            ["kode_gejala" => "G010", "nama_gejala" => "bila ditepuk seperti suara gendang"],
            ["kode_gejala" => "G011", "nama_gejala" => "demam"],
            ["kode_gejala" => "G012", "nama_gejala" => "nyeri sendi"],
            ["kode_gejala" => "G013", "nama_gejala" => "mudah lelah"],
            ["kode_gejala" => "G014", "nama_gejala" => "pembengkakkan kelenjar getah bening"],
            ["kode_gejala" => "G015", "nama_gejala" => "keringat berdarah"],
            ["kode_gejala" => "G016", "nama_gejala" => "mengeluarkan air liur yang banyak"],
            ["kode_gejala" => "G017", "nama_gejala" => "enggan bergerak"],
            ["kode_gejala" => "G018", "nama_gejala" => "pincang"],
            ["kode_gejala" => "G019", "nama_gejala" => "terdengar suara ngorok"]
        ];

        foreach ($data as $item) {
            Gejala::create([
                'kode_gejala' => $item['kode_gejala'],
                'nama_gejala' => $item['nama_gejala'],
            ]);
        }
    }
}
