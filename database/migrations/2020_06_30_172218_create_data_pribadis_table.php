<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataPribadisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_pribadis', function (Blueprint $table) {
            $table->Increments('id');
            $table->Integer('id_user');
            $table->string('nama_depan');
            $table->string('nama_belakang');
            $table->string('nomor_telepon');
            $table->string('provinsi');
            $table->string('kota');
            $table->string('url_foto');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_pribadis');
    }
}
