<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKeahlianTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('keahlian', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('id_kandidat')->index('keahlian_fk0');
			$table->string('nama_keahlian');
			$table->string('tingkatan');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('keahlian');
	}

}
