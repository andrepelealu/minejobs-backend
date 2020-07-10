<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUndanganInterviewTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('undangan_interview', function(Blueprint $table)
		{
			$table->foreign('id_kandidat', 'undangan_interview_fk0')->references('id')->on('user_kandidat')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_perusahaan', 'undangan_interview_fk1')->references('id')->on('user_perusahaan')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_iklan', 'undangan_interview_fk2')->references('id')->on('iklan_perusahaan')->onUpdate('RESTRICT')->onDelete('RESTRICT');

		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('undangan_interview', function(Blueprint $table)
		{
			$table->dropForeign('undangan_interview_fk0');
			$table->dropForeign('undangan_interview_fk1');
		});
	}

}
