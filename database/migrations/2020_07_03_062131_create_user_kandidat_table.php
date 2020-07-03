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
			$table->string('socialite_id')->nullable();
			$table->string('socialite_provider')->nullable();
			$table->string('nama_depan')->nullable();
			$table->string('nama_belakang')->nullable();
			$table->string('email');
			$table->string('password')->nullable();
			$table->string('avatar')->nullable();
			$table->string('status_akun')->nullable();
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
