<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAturUlangInterviewTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('atur_ulang_interview', function(Blueprint $table)
		{
			$table->foreign('id_undangan_interview', 'atur_ulang_interview_fk0')->references('id')->on('undangan_interview')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_kandidat', 'atur_ulang_interview_fk1')->references('id')->on('user_kandidat')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_perusahaan', 'atur_ulang_interview_fk2')->references('id')->on('user_perusahaan')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}

//
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('atur_ulang_interview', function(Blueprint $table)
		{
			$table->dropForeign('atur_ulang_interview_fk0');
			$table->dropForeign('atur_ulang_interview_fk1');
			$table->dropForeign('atur_ulang_interview_fk2');
		});
	}

}
