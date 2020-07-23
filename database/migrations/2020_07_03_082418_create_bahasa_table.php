<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBahasaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bahasa', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('id_kandidat')->index('bahasa_fk0');
			$table->string('bahasa_dikuasai');
			$table->string('kemampuan_verbal');
			$table->string('kemampuan_tulisan');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('bahasa');
	}

}
