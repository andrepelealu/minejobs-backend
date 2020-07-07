<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToIklanPerusahaanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('iklan_perusahaan', function(Blueprint $table)
		{
			$table->foreign('id_perusahaan', 'iklan_perusahaan_fk0')->references('id')->on('user_perusahaan')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('iklan_perusahaan', function(Blueprint $table)
		{
			$table->dropForeign('iklan_perusahaan_fk0');
		});
	}

}
