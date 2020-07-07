<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPreferensiPekerjaanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('preferensi_pekerjaan', function(Blueprint $table)
		{
			$table->foreign('id_kandidat', 'preferensi_pekerjaan_fk0')->references('id')->on('user_kandidat')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('preferensi_pekerjaan', function(Blueprint $table)
		{
			$table->dropForeign('preferensi_pekerjaan_fk0');
		});
	}

}
