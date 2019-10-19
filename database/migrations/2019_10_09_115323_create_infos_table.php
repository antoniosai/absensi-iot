<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_sekolah', function (Blueprint $table) {
            $table->increments('id');
            $table->string('logo');
            $table->string('nama');
            $table->string('alamat');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('email');
            $table->string('handphone');
            $table->string('fax')->nullable();
            $table->string('telp')->nullable();

            // Data Sekolah
            $table->string('npsn');
            $table->string('status');
            $table->string('bentuk_pendidikan');
            $table->string('status_kepemilikan');
            $table->string('sk_pendirian_sekolah')->nullable();
            $table->date('tanggal_sk_pendirian')->nullable();
            $table->string('sk_izin_operasional')->nullable();
            $table->date('tanggal_sk_izin_operasional')->nullable();

            // Tahun Ajaran
            $table->string('tahun_ajaran');
            $table->enum('semester', [1, 2]);

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
        Schema::dropIfExists('info_sekolah');
    }
}
