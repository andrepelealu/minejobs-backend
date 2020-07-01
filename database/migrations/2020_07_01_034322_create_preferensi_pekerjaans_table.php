<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreferensiPekerjaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preferensi_pekerjaans', function (Blueprint $table) {
            $table->Increments('id');
            $table->Integer('id_user')->unique();
            $table->integer('gaji_diharapkan');
            $table->string('provinsi');
            $table->string('kota');
            $table->string('bidang_pekerjaan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preferensi_pekerjaans');
    }
}
