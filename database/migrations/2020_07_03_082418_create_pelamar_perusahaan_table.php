<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePelamarPerusahaanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pelamar_perusahaan', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('id_kandidat')->index('pelamar_perusahaan_fk0');
			$table->integer('id_iklan')->index('pelamar_perusahaan_fk1');
			$table->integer('id_perusahaan')->index('pelamar_perusahaan_fk2');
			$table->string('status_lamaran')->default("belum diproses");

			$table->date('tanggal_lamaran');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pelamar_perusahaan');
	}

}
