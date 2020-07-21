<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToUserPerusahaanVerificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_perusahaan_verification', function (Blueprint $table) {
            //
            $table->foreign('id_kandidat', 'user_perusahaan_verification_fk0')->references('id')->on('user_perusahaan')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_kandidat_verification', function (Blueprint $table) {
            //
        });
    }
}
