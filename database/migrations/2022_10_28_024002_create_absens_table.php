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
        Schema::create('absens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('divisi_id');
            $table->foreignId('karyawan_id');
            $table->string('gaji');
            $table->string('potongan')->nullable();
            $table->time('jam_masuk');
            $table->string('terlambat');
            $table->time('jam_keluar')->nullable();
            $table->string('pulang_awal')->nullable();
            $table->time('jam_istirahat')->nullable();
            $table->string('selesai_istirahat')->nullable();
            $table->date('tanggal');
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
        Schema::dropIfExists('absens');
    }
};
