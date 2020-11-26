<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGambarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gambar', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_depan');
            $table->string('nama_belakang');
            $table->string('no_ktp');
            $table->string('email');
            $table->string('jenis_kelamin');
            $table->date('tgl_lahir');
            $table->string('no_tlp');
            $table->string('no_hp');
            $table->string('informasi');
            $table->string('job_title');
            $table->string('alamat');
            $table->string('provinces');
            $table->string('regencies');
            $table->string('districts');
            $table->string('villages');
            $table->string('kode_pos');
            $table->string('pendidikan_terakhir');
            $table->string('universitas');
            $table->string('jurusan');
            $table->string('ipk');
            $table->string('pengalaman');
            $table->string('file_cv');
            $table->string('file_ktp');
            $table->string('file_npwp');
            $table->string('file_bpjs_ketenagakerjaan');
            $table->string('file_bpjs_kesehatan');
            $table->string('file_transkrip_nilai');
            $table->string('file_ijazah');
            $table->string('file_surat_keterangan_kerja');
            $table->string('file_kartu_keluarga');
            $table->string('foto');
            $table->string('file_buku_nikah');
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
        Schema::dropIfExists('gambar');
    }
}
