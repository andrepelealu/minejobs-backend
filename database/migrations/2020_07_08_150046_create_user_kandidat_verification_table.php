<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserKandidatVerificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_kandidat_verification', function (Blueprint $table) {
            $table->integer('id',true);
            $table->integer('id_kandidat')->index('user_kandidat_verification_fk0');
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
        Schema::dropIfExists('user_kandidat_verification');
    }
}
