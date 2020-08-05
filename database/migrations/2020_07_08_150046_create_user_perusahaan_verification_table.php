<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPerusahaanVerificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_perusahaan_verification', function (Blueprint $table) {
            $table->integer('id',true);
            $table->integer('id_kandidat')->index('user_perusahaan_verification_fk0');
            $table->string('token');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_perusahaan_verification');
    }
}
