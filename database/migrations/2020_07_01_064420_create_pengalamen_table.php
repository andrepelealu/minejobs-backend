<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengalamenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengalamen', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('posisi');
            $table->string('nama_perusahaan');
            $table->string('id_user')->unique();
            $table->date('tahun_mulai');
            $table->date('tahun_selesai');
            $table->string('jabatan');
            $table->integer('gaji');
            $table->string('deskripsi_pekerjaan');
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
        Schema::dropIfExists('pengalamen');
    }
}
