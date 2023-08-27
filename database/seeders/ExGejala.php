<?php

namespace Database\Seeders;

use App\Models\Gejala;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExGejala extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_gejala = [
            ["kode_gejala" => "G001", "nama_gejala" => "Frekuensi Buang Air Besar (BAB) lebih sering"],
            ["kode_gejala" => "G002", "nama_gejala" => "Balita rewel dan nangis terus, tetapi tidak keluar air mata sewaktu menangis"],
            ["kode_gejala" => "G003", "nama_gejala" => "Kencing lebih jarang bisa dilihat dari popok yang jarang basah"],
            ["kode_gejala" => "G004", "nama_gejala" => "Balita mengalami demam"],
            ["kode_gejala" => "G005", "nama_gejala" => "Dehidrasi"],
            ["kode_gejala" => "G006", "nama_gejala" => "Nafsu makan berkurang"],
            ["kode_gejala" => "G007", "nama_gejala" => "Balita kesakitan saat BAB"],
            ["kode_gejala" => "G008", "nama_gejala" => "Sakit perut"],
            ["kode_gejala" => "G009", "nama_gejala" => "Frekuensi BAB kurang dari 3x seminggu"],
            ["kode_gejala" => "G010", "nama_gejala" => "Ada bercak feses pada popok"],
            ["kode_gejala" => "G011", "nama_gejala" => "Feses terlihat lebih besar"],
            ["kode_gejala" => "G012", "nama_gejala" => "Terjadi pembengkakan pada perut"],
            ["kode_gejala" => "G013", "nama_gejala" => "Mual dan muntah"],
            ["kode_gejala" => "G014", "nama_gejala" => "Batuk-batuk seperti mau muntah, terutama malam hari"],
            ["kode_gejala" => "G015", "nama_gejala" => "Susah bernafas"],
            ["kode_gejala" => "G016", "nama_gejala" => "Kehilangan nafsu makan atau tidak mau menyusui"],
            ["kode_gejala" => "G017", "nama_gejala" => "Berat badan turun"],
            ["kode_gejala" => "G018", "nama_gejala" => "Perut kembung"],
            ["kode_gejala" => "G019", "nama_gejala" => "Mengalami diare tapi dalam jumlah sedikit"],
            ["kode_gejala" => "G020", "nama_gejala" => "Diare berlendir"],
            ["kode_gejala" => "G021", "nama_gejala" => "Rasa sakit di bagian tengah perut"],
            ["kode_gejala" => "G022", "nama_gejala" => "Dalam beberapa jam, rasa sakit bergerak ke sisi kanan bawah perut"],
            ["kode_gejala" => "G023", "nama_gejala" => "Mengalami sendawa atau cecegukan"],
            ["kode_gejala" => "G024", "nama_gejala" => "Berat badan turun drastis"],
            ["kode_gejala" => "G025", "nama_gejala" => "BAB terlihat merah gelap atau hitam"],
            ["kode_gejala" => "G026", "nama_gejala" => "Rasa sakit seperti terbakar diperut antara tulang dada dan pusar"]
        ];

        foreach ($data_gejala as $item) {
            Gejala::create([
                'kode_gejala' => $item['kode_gejala'],
                'nama_gejala' => $item['nama_gejala'],
            ]);
        }
    }
}
