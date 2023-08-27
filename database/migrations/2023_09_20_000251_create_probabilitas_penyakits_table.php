<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('probabilitas_penyakit', function (Blueprint $table) {
            $table->id();
            $table->string('kode_penyakit');
            $table->string('kode_gejala');
            $table->string('jumlah_seluruh_penyakit');
            $table->string('jumlah_kemunculan');
            $table->string('probability');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('probabilitas_penyakit');
    }
};
