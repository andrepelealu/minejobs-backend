<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProfilePerusahaanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('profile_perusahaan', function(Blueprint $table)
		{
			$table->increments('id_profile_perusahaan');
			$table->integer('id_perusahaan')->index('profile_perusahaan_fk0');
			$table->string('nama_perusahaan');
			$table->string('alamat_perusahaan');
			$table->string('tentang_perusahaan');
			$table->string('url_banner');
			$table->string('foto_perusahaan');
			$table->string('website_perusahaan');
			$table->string('jenis_industri');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('profile_perusahaan');
	}

}
