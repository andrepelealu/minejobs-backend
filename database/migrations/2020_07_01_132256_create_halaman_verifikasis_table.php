<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHalamanVerifikasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('halaman_verifikasis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_user');
            $table->string('nama_perusahaan');
            $table->string('alamat_perusahaan');
            $table->string('nomor_telepon_kantor');
            $table->string('jenis_industri');
            $table->string('nama_pic');
            $table->string('jabatan_pic');
            $table->string('nomor_telepon_pic');
            $table->string('website_perusahaan');
            $table->string('upload_npwp_perusahaan');
            $table->string('upload_ktp_pic');
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
        Schema::dropIfExists('halaman_verifikasis');
    }
}
