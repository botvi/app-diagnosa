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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('kode_roles', 20);
            $table->string('kode_penyakit');
            $table->string('kode_gejala');
            $table->timestamps();

            $table->foreign('kode_penyakit')->references('id')->on('penyakit');
            $table->foreign('kode_gejala')->references('id')->on('gejala');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
};
