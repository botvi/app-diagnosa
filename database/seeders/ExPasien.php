<?php

namespace Database\Seeders;

use App\Models\Pasien;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExPasien extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ["nama_pasien" => "Fulan", "jenis_kelamin" => "Laki-laki", "alamat" => "Taluk Kuantan, Pekanbaru, Riau"],
            ["nama_pasien" => "Fulana", "jenis_kelamin" => "Perempuan", "alamat" => "Taluk Kuantan, Pekanbaru, Riau"]

        ];

        foreach ($data as $item) {
            Pasien::create([
                'nama_pasien' => $item['nama_pasien'],
                'jenis_kelamin' => $item['jenis_kelamin'],
                'alamat' => $item['alamat']
            ]);
        }
    }
}
