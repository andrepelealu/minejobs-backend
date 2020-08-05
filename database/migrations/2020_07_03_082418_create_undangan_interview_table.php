<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUndanganInterviewTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('undangan_interview', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('id_kandidat')->index('undangan_interview_fk0');
			$table->integer('id_perusahaan')->index('undangan_interview_fk1');
			$table->integer('id_iklan')->index('undangan_interview_fk2');
			$table->string('pesan');
			$table->date('tanggal_interview');
			$table->string('metode_interview');
			$table->time('waktu_mulai');
			$table->time('waktu_selesai');
			$table->string('url_concall')->nullable();
			$table->string('status');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('undangan_interview');
	}

}
