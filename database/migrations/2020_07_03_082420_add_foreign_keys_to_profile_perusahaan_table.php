<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToProfilePerusahaanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('profile_perusahaan', function(Blueprint $table)
		{
			$table->foreign('id_perusahaan', 'profile_perusahaan_fk0')->references('id')->on('user_perusahaan')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('profile_perusahaan', function(Blueprint $table)
		{
			$table->dropForeign('profile_perusahaan_fk0');
		});
	}

}
