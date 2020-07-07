<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDataPribadiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('data_pribadi', function(Blueprint $table)
		{
			$table->foreign('id_kandidat', 'data_pribadi_fk0')->references('id')->on('user_kandidat')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('data_pribadi', function(Blueprint $table)
		{
			$table->dropForeign('data_pribadi_fk0');
		});
	}

}
