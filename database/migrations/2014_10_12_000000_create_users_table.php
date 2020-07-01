<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->Increments('id');
            // $table->string('nama_depan');
            // $table->string('nama_belakang');
            // $table->string('no_telepon')->unique();
            $table->string('email')->unique();
            // $table->string('provinsi_dom');
            // $table->string('provinsi_kota');
            // $table->string('foto');
            // $table->string('tentang');
            // $table->string('resume');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
