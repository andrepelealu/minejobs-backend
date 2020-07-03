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
			$table->increments('id_pelamar');
			$table->integer('id_kandidat')->index('pelamar_perusahaan_fk0');
			$table->integer('id_iklan')->index('pelamar_perusahaan_fk1');
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
