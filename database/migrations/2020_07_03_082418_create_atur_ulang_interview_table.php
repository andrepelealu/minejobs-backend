<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAturUlangInterviewTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('atur_ulang_interview', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('id_undangan_interview')->index('atur_ulang_interview_fk0');
			$table->integer('id_kandidat')->index('atur_ulang_interview_fk1');
			$table->integer('id_perusahaan')->index('atur_ulang_interview_fk2');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('atur_ulang_interview');
	}

}
