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
			$table->integer('id_lamaran_tersimpan', true);
			$table->integer('id_iklan')->index('lamaran_tersimpan_fk0');
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
