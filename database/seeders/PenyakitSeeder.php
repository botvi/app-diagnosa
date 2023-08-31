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
                "kode_penyakit" => "P01",
                "nama_penyakit" => "Parasit Darah",
                "pengobatan" => "",
                "definisi" => "Endoparasit yg hidup dalam peredarah darah induk semang yg dapat menular dari ternak sapi keternak lainnya melalui vektor penyakit seperti caplak dan lalat penghisap darah."
            ],
            [
                "kode_penyakit" => "P02",
                "nama_penyakit" => "Tympani",
                "pengobatan" => "",
                "definisi" => "Penumpukan gell yang berlebih pada perut bagian kiri, sehingga kelihatan lebih menonjol."
            ],
            [
                "kode_penyakit" => "P03",
                "nama_penyakit" => "Brucellosis",
                "pengobatan" => "",
                "definisi" => "Infeksi yang disebabkan oleh bakteri Brucella dan merupakan penyakit"
            ],
            [
                "kode_penyakit" => "P04",
                "nama_penyakit" => "Jumrana",
                "pengobatan" => "",
                "definisi" => "Penyakit menular yg hanya pada sapi bali (tidak menular pada jenis sapi lainnya yg disebabkan oleh virus)"
            ],
            [
                "kode_penyakit" => "P05",
                "nama_penyakit" => "PMK",
                "pengobatan" => "",
                "definisi" => "Penyakit mulut dan kuku merupakan penyakit hewan yg sangat serius dan sangat menular, penyakit ini disebabkan oleh virus"
            ],
            [
                "kode_penyakit" => "P06",
                "nama_penyakit" => "SE",
                "pengobatan" => "",
                "definisi" => "Penyakit Septicaemia Epizootica/ngorok adalah suatu penyakit infeksi akut atau menahun pada sapi dan kerbau."
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
