<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDataPribadiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('data_pribadi', function(Blueprint $table)
		{
			$table->integer('id_data_pribadi', true);
			$table->integer('id_kandidat')->index('data_pribadi_fk0');
			$table->string('nomor_telepon');
			$table->string('provinsi');
			$table->string('kota');
			$table->string('tentang');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('data_pribadi');
	}

}
