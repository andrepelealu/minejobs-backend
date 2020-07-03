<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePengalamanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pengalaman', function(Blueprint $table)
		{
			$table->integer('id_pengalaman', true);
			$table->integer('id_kandidat')->index('pengalaman_fk0');
			$table->string('posisi_pekerjaan');
			$table->string('nama_perusahaan');
			$table->string('tahun_mulai');
			$table->string('tahun_selesai');
			$table->string('jabatan');
			$table->integer('gaji');
			$table->string('deskripsi_pekerjaan');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pengalaman');
	}

}
