<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePreferensiPekerjaanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('preferensi_pekerjaan', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('id_kandidat')->index('preferensi_pekerjaan_fk0');
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
		Schema::drop('preferensi_pekerjaan');
	}

}
