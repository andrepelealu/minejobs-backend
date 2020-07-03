<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToLamaranTersimpanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('lamaran_tersimpan', function(Blueprint $table)
		{
			$table->foreign('id_iklan', 'lamaran_tersimpan_fk0')->references('id_iklan')->on('iklan_perusahaan')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('lamaran_tersimpan', function(Blueprint $table)
		{
			$table->dropForeign('lamaran_tersimpan_fk0');
		});
	}

}
