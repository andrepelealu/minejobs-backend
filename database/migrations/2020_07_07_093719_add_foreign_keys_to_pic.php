<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToPic extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pic_perusahaan', function (Blueprint $table) {
            //
            $table->foreign('id_perusahaan', 'pic_perusahaan_fk0')->references('id')->on('user_perusahaan')->onUpdate('RESTRICT')->onDelete('RESTRICT');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pic', function (Blueprint $table) {
            //
        });
    }
}
