<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUploadCvTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('upload_cv', function(Blueprint $table)
		{
			$table->foreign('id_kandidat', 'upload_cv_fk0')->references('id')->on('user_kandidat')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('upload_cv', function(Blueprint $table)
		{
			$table->dropForeign('upload_cv_fk0');
		});
	}

}
