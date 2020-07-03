<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserKandidatTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_kandidat', function(Blueprint $table)
		{
			$table->integer('id_kandidat', true);
			$table->string('socialite_id');
			$table->string('socialite_provider');
			$table->string('nama_depan');
			$table->string('nama_belakang');
			$table->string('email');
			$table->string('password')->nullable();
			$table->string('avatar');
			$table->string('status_akun');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_kandidat');
	}

}
