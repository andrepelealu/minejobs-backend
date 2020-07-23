<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLamaranTersimpanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lamaran_tersimpan', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('id_iklan')->index('lamaran_tersimpan_fk0');
			$table->integer('id_kandidat')->index('lamaran_tersimpan_fk1');

		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('lamaran_tersimpan');
	}

}
