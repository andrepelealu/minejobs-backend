<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToKeahlianTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('keahlian', function(Blueprint $table)
		{
			$table->foreign('id_kandidat', 'keahlian_fk0')->references('id')->on('user_kandidat')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('keahlian', function(Blueprint $table)
		{
			$table->dropForeign('keahlian_fk0');
		});
	}

}
