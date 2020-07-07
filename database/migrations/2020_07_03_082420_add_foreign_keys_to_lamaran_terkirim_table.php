<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToLamaranTerkirimTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('lamaran_terkirim', function(Blueprint $table)
		{
			$table->foreign('id_kandidat', 'lamaran_terkirim_fk0')->references('id')->on('user_kandidat')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_iklan', 'lamaran_terkirim_fk1')->references('id')->on('iklan_perusahaan')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('lamaran_terkirim', function(Blueprint $table)
		{
			$table->dropForeign('lamaran_terkirim_fk0');
			$table->dropForeign('lamaran_terkirim_fk1');
		});
	}

}
