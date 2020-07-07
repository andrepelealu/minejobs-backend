<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePendidikanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pendidikan', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('id_kandidat')->index('pendidikan_fk0');
			$table->string('jenjang_pendidikan');
			$table->string('jurusan');
			$table->string('tahun_mulai');
			$table->string('tahun_selesai');
			$table->string('nama_instansi');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pendidikan');
	}

}
