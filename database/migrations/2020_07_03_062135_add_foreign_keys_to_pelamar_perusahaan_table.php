<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPelamarPerusahaanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pelamar_perusahaan', function(Blueprint $table)
		{
			$table->foreign('id_kandidat', 'pelamar_perusahaan_fk0')->references('id_kandidat')->on('user_kandidat')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_iklan', 'pelamar_perusahaan_fk1')->references('id_iklan')->on('iklan_perusahaan')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('pelamar_perusahaan', function(Blueprint $table)
		{
			$table->dropForeign('pelamar_perusahaan_fk0');
			$table->dropForeign('pelamar_perusahaan_fk1');
		});
	}

}
