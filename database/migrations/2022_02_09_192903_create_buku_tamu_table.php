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
        Schema::create('buku_tamu', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tamu', 40);
            $table->string('instansi', 40);
            $table->date('tanggal_janji')->nullable($value = true);
            $table->time('jam_janji')->nullable($value = true);
            $table->string('telpon', 15)->nullable($value = true);
            $table->string('nip');
            $table->string('yang_menerima')->nullable($value = true);
            $table->text('urusan');
            $table->integer('status_janji')->nullable($value = true);
            $table->integer('jumlah_tamu')->nullable($value = true);
            $table->date('tanggal_masuk')->nullable($value = true);
            $table->time('waktu_masuk')->nullable($value = true);
            $table->time('waktu_keluar')->nullable($value = true);
            $table->integer('nilai_pelayanan')->nullable($value = true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buku_tamu');
    }
};
