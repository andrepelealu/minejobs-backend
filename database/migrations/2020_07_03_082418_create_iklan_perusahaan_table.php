<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIklanPerusahaanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('iklan_perusahaan', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('id_perusahaan')->index('iklan_perusahaan_fk0');
			$table->string('posisi_pekerjaan');
			$table->integer('gaji_min');
			$table->integer('gaji_max');
			$table->string('provinsi');
			$table->string('kota');
			$table->string('bidang_pekerjaan');
			$table->string('tingkat_pendidikan');
			$table->string('pengalaman_kerja');
			$table->string('persyaratan');
			$table->string('benefit_perusahaan');
			$table->string('url_header');
			$table->integer('status_iklan')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('iklan_perusahaan');
	}

}
