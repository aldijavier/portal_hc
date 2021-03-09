<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormUploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_uploads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_perusahaan');
            $table->string('jabatan');
            $table->string('deskripsi_job');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('masih_aktif_bekerja');
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
        Schema::dropIfExists('form_uploads');
    }
}
