<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToJadwalInterviewTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('jadwal_interview', function(Blueprint $table)
		{
			$table->foreign('id_undangan_interview', 'jadwal_interview_fk0')->references('id')->on('undangan_interview')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_kandidat', 'jadwal_interview_fk1')->references('id')->on('undangan_interview')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_perusahaan', 'jadwal_interview_fk2')->references('id')->on('undangan_interview')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('jadwal_interview', function(Blueprint $table)
		{
			$table->dropForeign('jadwal_interview_fk0');
			$table->dropForeign('jadwal_interview_fk1');
			$table->dropForeign('jadwal_interview_fk2');
		});
	}

}
