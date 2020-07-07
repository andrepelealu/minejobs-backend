<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLamaranTerkirimTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lamaran_terkirim', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('id_kandidat')->index('lamaran_terkirim_fk0');
			$table->integer('id_iklan')->index('lamaran_terkirim_fk1');
			$table->date('tanggal_kirim');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('lamaran_terkirim');
	}

}
