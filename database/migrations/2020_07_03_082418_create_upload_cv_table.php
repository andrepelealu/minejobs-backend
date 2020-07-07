<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUploadCvTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('upload_cv', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('id_kandidat')->index('upload_cv_fk0');
			$table->string('url_cv');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('upload_cv');
	}

}
