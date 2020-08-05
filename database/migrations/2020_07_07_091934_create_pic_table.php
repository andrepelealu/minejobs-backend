<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pic_perusahaan', function (Blueprint $table) {
			$table->integer('id', true);
			$table->integer('id_perusahaan')->index('pic_perusahaan_fk0');
			$table->string('nama_pic');
			$table->string('no_telp_pic');
            $table->string('url_ktp_pic')->nullable();
            $table->string('url_foto_profile')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pic_perusahaan');
    }
}
