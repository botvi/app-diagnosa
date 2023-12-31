<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            GejalaSeeder::class,
            PenyakitSeeder::class,
            SAturan::class,
            // ExGejala::class,
            // ExPenyakit::class,
            // ExAturan::class,
            // Diagnosa::class,
            UsersSeeder::class,
            ExPasien::class,
        ]);
    }
}
